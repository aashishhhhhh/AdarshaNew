<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\Picture;
use Livewire\Component;
use File;

class SliderList extends Component
{

    public $slider;
    public $pagee;
    public $msg=false;
    public $page;
    public function render()
    {
        $this->pagee=Page::query()->where('slug','slider')->first();
        $this->slider=$this->pagee == null ? '' : $this->pagee->load('pictures');
        return view('livewire.slider-list');
    }

    public function removeImage($value)
    {
        $picture=Picture::query()->where('id',$value)->first();
        if (File::exists(public_path('storage/thumbnails/' . $picture->url))) {
            File::delete(public_path('storage/thumbnails/' . $picture->url));
            File::delete(public_path('storage/upload/' . $picture->url));
            Picture::query()->where('id',$value)->delete();
            $this->msg='Slider deleted Sucessfully';
            $this->render();
        }
    //    Picture::query()->where('id',$value)->delete();
    //    $this->msg='Slider deleted Sucessfully';
    //    $this->render();
    }
}
