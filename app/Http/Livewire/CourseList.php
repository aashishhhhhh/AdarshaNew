<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Page;
use Livewire\Component;

class CourseList extends Component
{
    public $course;
    public $faculty;
    public $facultyId;
    public $showCourse=false;
    public $courses;
    public $courseId;
    public $msg=null;
    public function render()
    {
        return view('livewire.course-list');
    }

    public function updatedFacultyId($value)
    {
        $this->msg=null;
       $this->facultyId=$value;
       $this->course= Page::query()->where('page_id',$value)->with('pictures')->get();
        $this->showCourse=true;
    }

    public function editCourse($value)
    {
        $this->courseId=$value;
        $this->msg=null;
        $this->courses=Course::find($value);
        $this->dispatchBrowserEvent('edit-course');
    }   

    public function deleteCourse($value)
    {
       Course::find($value)->delete();
       $this->updatedFacultyId($this->facultyId);
       $this->msg='Course is successfully deleted';
    }

    // public function addCourse()
    // {
    //     $this->dispatchBrowserEvent('add-course');
    // }

}
