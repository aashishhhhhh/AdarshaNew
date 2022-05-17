<?php

namespace App\Http\Controllers;

use App\Http\Helper\MediaHelper;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Page;
use App\Models\PageType;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public $slug='faculties';
    public function __construct()
    {
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
    }
    public function index()
    {
        $faculty= $this->pageType->load('pages');
        return view('course.course-list',['faculty'=>$faculty]);
    }

    public function store(Request $request,MediaHelper $mediaHelper)
    {
        
      $data=$request->validate([
          'course'=>'required',
          'content'=>'required',
          'photo'=>'sometimes',
          'facultyId'=>'required',
      ]);

      DB::transaction(function () use ($request, $mediaHelper) {


      $id=Page::create([
          'title'=>$request->course,
          'slug'=>Str::slug($request->course),
          'content'=>json_encode($request->only('content')),
          'page_id'=>$request->facultyId,
          'page_type_id'=>null,
          'show_on_home'=>1
      ]);

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
    return redirect()->route('course.index')->with('msg','Course Created successfully');
    }

    public function edit(Page $course)
    {
       $course=$course->load('pictures');
       
        return view('course.course-edit',compact('course'));
    }

    public function update(Request $request,Page $course,MediaHelper $mediaHelper)
    {
       
        DB::transaction(function () use ($request, $mediaHelper,$course) {

            if ($request->hasFile('photo')) {
                if ($course->pictures()->first()!=null) {
                    $course->pictures()->first()->delete();
                }
                $imageName=$mediaHelper->uploadSingleImage($request->photo);
                Picture::create([
                    'imageable_id'=>$course->id,
                    'imageable_type'=>Page::NAMESPACE,
                    'url'=>$imageName,
                    'is_banner'=>0
                ]);
            }
            $course->update([
                'title'=>$request->course,
                'content'=>json_encode($request->only('content')),
                'slug'=>Str::slug($request->course),
            ]);
          });
       
        return redirect()->route('course.index')->with('msg','Course Updated successfully');

    }

    public function destroy(Page $course)
    {
       $course->delete();
       return redirect()->route('course.index')->with('msg','Course Deleted successfully');
    }

    public function addCourse(Page $faculty)
    {
        return view('course.course-add',compact('faculty'));
    }
}
