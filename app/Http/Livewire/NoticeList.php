<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\PageType;
use Livewire\Component;

class NoticeList extends Component
{
    public $notice;
    public $notices;
    public $slug='notice-board';
    public $pageType;
    public $showNotice=false;
    public $noticeChild;
    public function render()
    {
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
        $this->notices=$this->pageType->load('pages');
        return view('livewire.notice-list');
    
    }
    public function editNotice($id)
    {
        $this->msg=null;
        $this->noticeChild= Page::find($id);
        $this->dispatchBrowserEvent('edit-notice');
    }
    public function addNotice()
    {
        $this->dispatchBrowserEvent('add-notice');
    }

    public function deleteNotice($id)
    {
        Page::find($id)->delete();
        $this->msg='Faculty deleted';
        $this->render();
    }

    public function showNotices($id)
    {
       $this->noticeChild=Page::query()->where('page_id',$id)->get();
    //    foreach ($this->noticeChild as $key => $value) {
    //     $data=json_decode($value->content);
    //     dd($data->date);
    //    }
       $this->showNotice=true;
    }

    
}
