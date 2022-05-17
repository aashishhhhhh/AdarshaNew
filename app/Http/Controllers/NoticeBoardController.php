<?php

namespace App\Http\Controllers;

use App\Http\Helper\MediaHelper;
use App\Models\Page;
use App\Models\PageType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class NoticeBoardController extends Controller
{
    public $slug='notice-board';
    public $page;
    public function __construct()
    {
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
        
    }
    public function index()
    {
        return view('notice.notice', [
            'notice' => $this->pageType == null ? '' : $this->pageType->load('pages')
        ]);
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'notice'=>'required'
        ]);

        
        $page = page::create( [
            'page_type_id' => $this->pageType->id,
            'slug'=>Str::slug($request->notice),
            'title'=>$request->notice,
            'show_on_home'=>1,
            'page_type_id'=>$this->pageType->id
        ]);
        return redirect()->route('notice.index')->with('msg','Notice Stored successfully');
    }

    public function update(Page $notice,Request $request)
    {
       $data=$request->validate(['notice'=>'required']);
       $notice->update([
           'title'=>$data['notice']
       ]);
       return redirect()->route('notice.index')->with('msg','Notice Updated successfully');
    }

    public function destroy(Page $notice)
    {
    }

    public function noticesAdd(Page $notice)
    {
      return view('notice.notice-add',compact('notice'));
    }

    public function noticesStore(Request $request,MediaHelper $mediaHelper)
    {
        dd($request->all());
        $data= $request->validate([
            'title'=>'required',
            'date'=>'required',
            'notice'=>'required',
            'file'=>'sometimes'
        ]);
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
                'page_id'=>$request->noticeId,  
                'content'=>json_encode([$request->except(['_token','noticeId']),'RealFile'=>$fileName]),
                'page_type_id'=>null,
                'show_on_home'=>1
            ]);
         }
       
        return redirect()->route('notice.index')->with('msg','Notice Added successfully');
    }

    public function noticesEdit(Page $notice)
    {
        // dd($notice);
        return view('notice.notice-edit',compact('notice'));
    }

    public function noticesUpdate(Request $request)
    {
        $notice=Page::find($request->noticeId);
        $notice->update([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'content'=>json_encode($request->except(['_token','noticeId'])),
        ]);
        return redirect()->route('notice.index')->with('msg','Notice Updated successfully');
    }

    public function noticesDelete(Page $notice)
    {
        $file=json_decode($notice->content);
        if (File::exists(public_path('storage/upload/' . $file->RealFile))) {
            File::delete(public_path('storage/upload/' . $file->RealFile));
        }
        $notice->delete();
        return redirect()->route('notice.index')->with('msg','Notice Deleted successfully');
    }
}