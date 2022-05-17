<?php

namespace App\Http\Livewire;

use App\Models\Picture;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use File;

class ShowPictures extends Component
{

    public $album;
    public $msg=null;
    public function render()
    {
        $this->album=$this->album->load('pictures');
        return view('livewire.show-pictures');
    }

    public function removeImage($id)
    {
       $picture= Picture::find($id);
       if (File::exists(public_path('storage/upload/' . $picture->url))) {
        File::delete(public_path('storage/upload/' . $picture->url));
        Picture::query()->where('id',$id)->delete();
        $this->msg='Slider deleted Sucessfully';
        $this->render();
    }
       
        
    }
    

}
