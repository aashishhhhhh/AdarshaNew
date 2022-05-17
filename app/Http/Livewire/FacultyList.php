<?php

namespace App\Http\Livewire;

use App\Models\Faculty;
use App\Models\Page;
use App\Models\PageType;
use Livewire\Component;

class FacultyList extends Component
{
    public $faculty;
   public $faculties;
   public $msg=null;
   public $pageType;
   public $slug='faculties';

    public function render()
    {
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
        $this->faculty=$this->pageType->load('pages');
        return view('livewire.faculty-list');
    }

    public function editFaculty($id)
    {
        $this->msg=null;
        $this->faculties= Page::find($id);
        $this->dispatchBrowserEvent('edit-faculty');
    }
    public function addFaculty()
    {
        $this->dispatchBrowserEvent('add-faculty');
    }

    public function deleteFaculty($id)
    {
        Page::find($id)->delete();
        $this->msg='Faculty deleted';
        $this->render();
    }
}
