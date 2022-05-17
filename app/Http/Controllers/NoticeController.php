<?php

namespace App\Http\Controllers;

use App\Models\PageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Helper\MediaHelper;
use App\Models\Page;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    public $slug='notice-board';
    public $page;
    public function __construct()
    {
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
        
    }

    public function index()
    {
        return view('notices.notice-list', [
            'notice' => $this->pageType == null ? '' : $this->pageType->load('pages')
        ]);
    }

    public function create()
    {
        return view('notices.notice-add');
    }

    public function store(Request $request,MediaHelper $mediaHelper)
    {
        // dd($request->all());
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'required'
        ]);
        DB::transaction(function () use ($request, $mediaHelper) {
            if ($request->file->getClientOriginalExtension()=='pdf') {
                $fileName =  Str::random(10) . "." . $request->file->getClientOriginalExtension();
                $request->file->storeAs('upload', $fileName, 'public');
            }
            else{
                dd('jpg');
                $fileName=$mediaHelper->uploadSingleImage($request->file);
            }
           json_encode([$request->except('_token'),'RealFile'=>$fileName]);
           $id= Page::create([
                'slug'=>Str::slug($request->title),
                'title'=>$request->title,
                'content'=>json_encode([$request->except('_token'),'RealFile'=>$fileName]),
                'page_type_id'=>$this->pageType->id,
                'show_on_home'=>1
            ]);
        });
        return redirect()->route('notice.index')->with('msg','Notice Created successfully');
    }

    public function edit(Page $notice)
    {
        return view('notices.notice-edit',compact('notice'));
    }

    public function update(Request $request,MediaHelper $mediaHelper, Page $notice)
    {
        
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'sometimes'
        ]);

        DB::transaction(function () use ($request, $mediaHelper,$notice) {

            if ($request->hasFile('file')) {
                if ($request->file->getClientOriginalExtension()=='pdf') {
                    $orginalName = Str::before($request->file->getClientOriginalName(), '.');
                    $fileName =  $orginalName . "-" . Str::random(10) . "." . $request->file->extension();
                    $filePath = storage_path() . '/app/public/upload/';
                    $request->file->storeAs('upload', $fileName, 'public');
                }
                else{
                    $fileName=$mediaHelper->uploadSingleImage($request->file);
                }
               json_encode([$request->except('_token'),'RealFile'=>$fileName]);
               $notice->update([
                   'title'=>$request->title,
                   'content'=>json_encode([$request->except('_token'),'RealFile'=>$fileName]),
               ]);
             }
             else{
                 $data=json_decode($notice->content,true);
                 $fileName=$data['RealFile'];
                 $notice->update([
                     'title'=>$request->title,
                     'content'=>json_encode([$request->except('_token'),'RealFile'=>$fileName]),
                 ]);
             }
            });
            return redirect()->route('notice.index')->with('msg','Notice Updated successfully');

    }

    public function notice_destroy($notice)
    {
        $notice= Page::query()->where('id',$notice)->first();
        $notice->delete();
        return redirect()->route('notice.index')->with('msg','Notice Deleted successfully');
    }
}
