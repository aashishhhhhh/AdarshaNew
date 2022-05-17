<?php

namespace App\Http\Controllers;

use App\Http\Helper\MediaHelper;
use App\Models\Page;
use App\Models\PageType;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Str;
use File;
use ReflectionFunctionAbstract;

class GalleryController extends Controller
{
    public $slug='gallery';
    public $pageType;
    public function __construct()
    {
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
    }
    public function index()
    {
        return view('gallery.gallery', [
            'gallery' => $this->pageType == null ? '' : $this->pageType->load('pages')
        ]);
    }

    public function create()
    {
        return view('gallery.gallery-add');
    }

    public function store(Request $request,MediaHelper $mediaHelper){
        // dd($request->all());
        $data=$request->validate([
            'title'=>'required',
            'photo.*' => 'required',
        ]);
        DB::transaction(function () use ($request, $mediaHelper) {
            if ($request->hasFile('photo')) {
                foreach ($request->photo as $key => $image) {
                   $imageName[]=$mediaHelper->uploadSingleImage($image);

                }
                $id= Page::create([
                    'slug'=>Str::slug($request->title),
                    'title'=>$request->title,
                    'page_id'=>$request->album_id,
                    'content'=>json_encode($request->except('_token')),
                    'page_type_id'=>null,
                    'show_on_home'=>1
                ]);

                foreach ($imageName as $key => $image) {
                    Picture::create([
                        'imageable_id'=>$id->id,
                        'imageable_type'=>Page::NAMESPACE,
                        'url'=>$image,
                        'is_banner'=>0
                    ]);
                }
            }
        });
        return redirect()->route('gallery.index')->with('msg','Gallery Created successfully');

    }

    public function edit(Page $gallery)
    {
        $gallery=$gallery->load('pictures');
        return view('gallery.gallery-edit',compact('gallery'));
    }

    public function update(Request $request,MediaHelper $mediaHelper,Page $gallery)
    {
        $data=$request->validate([
            'title'=>'required',
            'photo.*' => 'required',
        ]);
        DB::transaction(function () use ($request, $mediaHelper,$gallery) {
            if ($request->hasFile('photo')) {
                foreach ($request->photo as $key => $image) {
                   $imageName[]=$mediaHelper->uploadSingleImage($image);
                }

                foreach ($imageName as $key => $image) {
                    Picture::create([
                        'imageable_id'=>$gallery->id,
                        'imageable_type'=>Page::NAMESPACE,
                        'url'=>$image,
                        'is_banner'=>0
                    ]);
                }
            }
            $gallery->update([
                'slug'=>Str::slug($request->title),
                'content'=>json_encode($request->except('_token')),
                'title'=>$request->title,
            ]);
        });
        return redirect()->route('gallery.index')->with('msg','Gallery Created successfully');
    }

    public function showPhotos(Page $album)
    {
        
       $album = $album->load('pictures');
        return view('gallery.show-pictures',compact('album'));
    }

    public function galleryDestroy(Page $gallery)
    {
       if ($gallery->load('pictures')!=null) {
           $gallery->load('pictures')->delete();
           $gallery->delete();
       }
       return redirect()->route('gallery.index')->with('msg','Gallery Deleted successfully');
    }

    public function albumCreate(Page $album)
    {
        return view('gallery.album-add',compact('album'));
    }

    public function albumEdit(Page $album )
    {
        $album->load('pictures');
        return view('gallery.album-edit',compact('album'));
    }

    public function albumDelete(Page $album)
    {
       $album->load('pictures');
       if (count($album->pictures)!=null) {
           foreach ($album->pictures as $key => $value) {
            if (File::exists(public_path('storage/upload/' . $value->url))) {
                File::delete(public_path('storage/upload/' . $value->url));
            }
           }
           $album->delete();
        return redirect()->route('gallery.index')->with('msg','Album Deleted successfully');
       }
    }

    public function addVideo(Page $album)
    {
        return view('gallery.video-add',compact('album'));
    }

    public function storeVideo(Request $request)
    {
        $data=$request->validate([
            'title'=>'required',
            'link'=>'required'
        ]);
        $link=$this->convertYoutube($request->link);
        DB::transaction(function () use ($request,$link) {
                $id= Page::create([
                    'slug'=>Str::slug($request->title),
                    'title'=>$request->title,
                    'page_id'=>$request->album_id,
                    'content'=>json_encode([$request->except('_token'),$link]),
                    'page_type_id'=>null,
                    'show_on_home'=>1
                ]);
        });
        return redirect()->route('gallery.index')->with('msg','Gallery Created successfully');
    }

    public function  convertYoutube($string) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
            $string
        );
    }

    public function showVideo(Page $album)
    {
        return view('gallery.show-video',compact('album'));
    }
    public function editVideo(Page $album)
    {
        return view('gallery.video-edit',compact('album'));
    }

    public function videoUpdate(Request $request)
    {
        $album=Page::query()->where('id',$request->album_id)->first();
        $data=$request->validate([
            'title'=>'required',
            'link'=>'required'
        ]);
        $link=$this->convertYoutube($request->link);
        DB::transaction(function () use ($request,$link,$album) {
            $album->update([
                'slug'=>Str::slug($request->title), 
                'title'=>$request->title,
                'content'=>json_encode([$request->except('_token'),$link]),
            ]);
        });
        return redirect()->route('gallery.index')->with('msg','Video Gallery Edited successfully');

    }

    public function videoDelete(Page $album)
    {
        $album->delete();
        return redirect()->route('gallery.index')->with('msg','Video Deleted Edited successfully');
    }

}
