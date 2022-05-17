<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;

class Gallery extends Component
{
    public $gallery;
    public $albums;
    public $showGallery=false;
    public $galleryId;
    public $galleryType;
    public $showVideo=false;
    public function render()
    {
        return view('livewire.gallery');
    }

    public function showGallery($value)
    {
        
        $this->galleryId=$value;
        $this->galleryType=Page::query()->where('id',$value)->first();
        if ($this->galleryType->title=='VIDEO GALLERY') {
            $this->showVideo=true;
            $this->showGallery=false;
        }
        else{
            $this->showGallery=true;
            $this->showVideo=false;
        }
        $this->albums=Page::query()->where('page_id',$value)->with('pictures')->get();
        
        
    }
}
