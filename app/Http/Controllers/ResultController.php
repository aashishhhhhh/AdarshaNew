<?php

namespace App\Http\Controllers;

use App\Http\Helper\MediaHelper;
use App\Models\Page;
use App\Models\PageType;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ResultController extends Controller
{
    public $slug='result';
    public $pageType;
    public function __construct()
    {
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
    }
    public function index()
    {
     
        return view('result.result-list', [
            'result' => $this->pageType == null ? '' : $this->pageType->load('pages')
        ]);
    }

    public function create()
    {
        return view('result.result-add');
    }

    public function store(Request $request,MediaHelper $mediaHelper)
    {

        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'sometimes'
        ]);
        DB::transaction(function () use ($request, $mediaHelper) {

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
           $id= Page::create([
                'slug'=>Str::slug($request->title),
                'title'=>$request->title,
                'content'=>json_encode([$request->except('_token'),'RealFile'=>$fileName]),
                'page_type_id'=>$this->pageType->id,
                'show_on_home'=>1
            ]);
         }
        });
        return redirect()->route('result.index')->with('msg','Result Created successfully');
    }

    public function edit(Page $result)
    {
        return view('result.result-edit',compact('result'));
    }   

    public function update(Request $request,MediaHelper $mediaHelper, Page $result)
    {
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'sometimes'
        ]);

        DB::transaction(function () use ($request, $mediaHelper,$result) {

            if ($request->hasFile('file')) {
                if ($request->file->getClientOriginalExtension()=='pdf') {
                    $fileName =  Str::random(10) . "." . $request->file->getClientOriginalExtension();
                    $request->file->storeAs('upload', $fileName, 'public');
                }
                else{
                    $fileName=$mediaHelper->uploadSingleImage($request->file);
                }
               json_encode([$request->except('_token'),'RealFile'=>$fileName]);
               $result->update([
                   'title'=>$request->title,
                   'content'=>json_encode([$request->except('_token'),'RealFile'=>$fileName]),
               ]);
             }
             else{
                 $data=json_decode($result->content,true);
                 $fileName=$data['RealFile'];
                 $result->update([
                     'title'=>$request->title,
                     'content'=>json_encode([$request->except('_token'),'RealFile'=>$fileName]),
                 ]);
             }
            });
            return redirect()->route('result.index')->with('msg','Result Updated successfully');

    }

    public function resultDestroy(Page $result)
    {
        $result->delete();
        return redirect()->route('result.index')->with('msg','Result Deleted successfully');

    }
}
