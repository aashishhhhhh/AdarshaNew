<?php

namespace App\Http\Controllers;

use App\Http\Helper\MediaHelper;
use App\Models\metaPage;
use App\Models\Page;
use App\Models\PageType;
use App\Models\Picture;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
class SliderController extends Controller
{
    public $slug;
    public $page;
    public function __construct()
    {
        $this->slug='slider';
        $this->page=Page::query()->where('slug',$this->slug)->first();
    }
    public function index()
    {
       
        return view('slider.slider-list', [
            'slider' => $this->page == null ? '' : $this->page->load('pictures'),
            'page' => $this->page
        ]);

        // return view('slider.slider-list',compact('slider'));
    }
    public function create()
    {
        return view('slider.slider-add');
    }

    
    public function store(Request $request,MediaHelper $mediaHelper)
    {
        if ($this->page==null) {
            $PageType= PageType::where('slug',$this->slug)->first();
            $title=strtoupper($this->slug);
            Page::create([
                'slug'=>$this->slug,
                'title'=>$title,
                'page_type_id'=>$PageType->id,
                'show_on_home'=>1
            ]);
            $this->page=Page::query()->where('slug',$this->slug)->first();
        }
        $data=$request->validate([
            'title'=>'sometimes',
            'photo.*' => 'required'
        ]);
        DB::transaction(function () use ($request, $mediaHelper) {

        if (count($request->file('photo'))>=0) {
            foreach ($request->photo as $key => $image) {
               $imageName[]=$mediaHelper->uploadSingleImage($image);
            }
            foreach ($imageName as $key => $image) {
                Picture::create([
                    'imageable_id'=>$this->page->id,
                    'imageable_type'=>Page::NAMESPACE,
                    'url'=>$image,
                    'description'=>$request->title,
                    'is_banner'=>0
                ]);
            }
        }
    });
        Page::query()->where('id',$this->page->id)->update([
            'content'=>json_encode($request->only('title'))
        ]);
        return redirect()->route('sliders.index')->with('msg','Slider inserted successfully');
    }

    public function edit(Page $slider)
    {
              
        return view('slider.slider-edit', [
            'page' => $slider,
            'images' => $slider->load('pictures')->pictures,
        ]);
    }

    public function update(Request $request,MediaHelper $helper,Page $slider)
    {
        DB::transaction(function () use ($request, $slider, $helper) {

            if ($request->hasFile('photo')) {
                foreach ($request->photo as $key => $image) {
                    $imageName[] = $helper->uploadSingleImage($image);
                }
            foreach ($imageName as $image) {
                Picture::create(
                    [
                        'imageable_id' => $this->page->id,
                        'imageable_type' => Page::NAMESPACE,
                        'url' => $image,
                        'is_banner'=>0
                    ]
                );
            }
        }
        });

       Page::where('id',$this->page->id)->update([
           'content'=>json_encode($request->only('title'))
       ]);
       return redirect()->route('sliders.index')->with('msg','Slider inserted successfully');

    }


 
}
