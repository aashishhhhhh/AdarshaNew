<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Page;
use App\Models\PageType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    public $slug='faculties';
    public $page;
    public function __construct()
    {
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
    }

    public function index()
    {
        // dd($this->pageType->load('pages'));
        return view('faculty.faculty-list', [
            'faculty' => $this->pageType == null ? '' : $this->pageType->load('pages')
        ]);
        
    }
    
    public function store(Request $request)
    {
        $data=$request->validate([
            'faculty'=>'required'
        ]);
        $page = page::create( [
            'page_type_id' => $this->pageType->id,
            'slug'=>Str::slug($request->faculty),
            'title'=>$request->faculty,
            'show_on_home'=>1,
        ]);
        return redirect()->route('faculty.index')->with('msg','Faculty Stored successfully');
    }

    public function update(Page $faculty,Request $request)
    {
       $data=$request->validate(['faculty'=>'required']);
       $faculty->update([
           'title'=>$data['faculty']
       ]);
       return redirect()->route('faculty.index')->with('msg','Faculty Updated successfully');
    }

   
}
