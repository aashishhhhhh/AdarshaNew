<?php

namespace App\Http\Controllers;

use App\Http\Helper\MediaHelper;
use App\Models\Message;
use App\Models\Page;
use App\Models\PageType;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Str;

class MessageController extends Controller
{
   public $slug='message';
   public $pageType;

    public function __construct()
    {
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
    }

    public function index()
    {
        $page=Page::query()->where('title',"Principle's Message")->first();
        return view('message.message', [
            'message' => $page == null ? '' : $page->load('pictures'),
            'page' => $page
        ]);
    }

    public function create()
    {
        return view('message.message-add');
    }

    public function store(Request $request,MediaHelper $mediaHelper)
    {
        $page= Page::query()->where('title',$this->slug)->first();
        $data=$request->validate([
            'name'=>'required',
            'message'=>'required',
            'photo'=>'required'
        ]);
        DB::transaction(function () use ($request, $mediaHelper,$page) {
        $this->title=$request->title;
        if ($page==null) {
           $id= Page::create([
                'slug'=>Str::slug($request->title),
                'title'=>$request->title,
                'content'=>json_encode($request->except('_token')),
                'page_type_id'=>null,
                'show_on_home'=>1
            ]);

        }
            if ($request->hasFile('photo')) {
                   $imageName=$mediaHelper->uploadSingleImage($request->photo);
                    Picture::create([
                        'imageable_id'=>$id->id,
                        'imageable_type'=>Page::NAMESPACE,
                        'url'=>$imageName,
                        'is_banner'=>0
                    ]);

                }
        });
        
        return redirect()->route('message.index')->with('msg','Message inserted successfully');
    }

    public function edit(Page $message)
    {
        $message=$message->load('pictures');
        return view('message.message-edit',['message'=>$message]);
    }

    public function update(Page $message,Request $request,MediaHelper $mediaHelper)
    {
        if ($request->hasFile('photo')) {
         $message->pictures()->first()->delete(); 
         $imageName=$mediaHelper->uploadSingleImage($request->photo);
         Picture::create([
             'imageable_id'=>$message->id,
             'imageable_type'=>Page::NAMESPACE,
             'url'=>$imageName,
             'is_banner'=>0
         ]);
        } 
        Page::where('title',"Principle's Message")->update([
            'content'=>json_encode( $request->except('_token'))
        ]);
        return redirect()->route('message.index')->with('msg','Message Updated successfully');
    }

    public function destroy(Page $message)
    {
        $message->pictures()->delete();
        $message->delete();
        return redirect()->route('message.index')->with('msg','Message Deleted successfully');
    }
}
