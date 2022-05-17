<?php

namespace App\Http\Controllers;

use App\Http\Helper\MediaHelper;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use App\Models\Page;
use App\Models\PageType;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class AboutUsController extends Controller
{
    public $slug;
    public $pageType;
    public function __construct()
    {
        $this->slug='about-us';
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
    }
    public function index()
    {
       $aboutus= $this->pageType;
        return view('about-us.about-us', [
            'aboutus' => $this->pageType == null ? '' : $this->pageType->load('pages')
        ]);
        // $aboutus=Page::query()->where('slug',$this->slug)->get();
    }
    public function create()
    {
         return view('about-us.about-us-add');
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

           $id= Page::create([
                'slug'=>Str::slug($request->title),
                'title'=>$request->title,
                'content'=>json_encode($request->except('_token')),
                'page_type_id'=>$this->pageType->id,
                'show_on_home'=>1
            ]);

        return redirect()->route('aboutus.index')->with('msg','About Us Content Created successfully');

     }

     public function edit($id)
     {
         $aboutus=Page::find($id);
         return view('about-us.about-us-edit',compact('aboutus'));
     }

     public function update(Request $request,$aboutus)
     {
         $aboutus=Page::find($aboutus);
        $data=$request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

        $aboutus->update([
            'slug'=>Str::slug($request->title),
            'title'=>$request->title,
            'content'=>json_encode($request->except('_token')),
        ]);
        return redirect()->route('aboutus.index')->with('msg','About Us Content Created successfully');
     }


    public function updatee(Request $request)
    {
       $request=json_encode($request->except('_token'));
            Page::query()->where('slug',$this->slug)->update([
            'content'=>$request
            ]);
        return redirect()->route('aboutUs-edit')->with('msg','About Us Content inserted successfully');
    }

    public function addDetail(Page $aboutus)
    {
        if ($aboutus->id!=120) {
        $members= Page::query()->where('page_id',120)->orderBy('position','ASC')->get();
        return view('about-us.add-others-detail',['aboutus'=>$aboutus,'members'=>$members]);
        }
     
        $members= Page::query()->where('page_id',$aboutus->id)->orderBy('position','ASC')->get();
        if (count($members)==0) {
            $members= Page::query()->where('page_id',120)->orderBy('position','ASC')->get();
            return view('about-us.add-detail',['aboutus'=>$aboutus,'members'=>$members]);
        }
        else{
            return view('about-us.add-detail',['aboutus'=>$aboutus,'members'=>$members]);
        }
    }

    public function storeDetail(Request $request, MediaHelper $mediaHelper)
    {

        $data= $request->validate([ 
            'name.*'=>'required',
            'designation.*'=>'required',
            'photo.*'=>'required',
            'position'=>'required'
        ]);

        $members= Page::query()->where('page_id',$request->aboutUsId)->with('pictures')->get();

        if (count($members)>0) {
            $length= count($members);
            $requestLength= count($request->name);
            
           foreach ($request->name as $key => $value) {
              if ($key+1>$length) {
                  # code...
                $data=array();
                $data['name']=$request->name[$key];
                $data['designation']=$request->designation[$key];
                $data['position']=$request->position[$key];
                if (array_key_exists('photo',$request->all())) {
                    if (array_key_exists($key,$request->photo)) {
                    $id=Page::create([
                            'slug'=>Str::slug($request->name[$key]),
                            'title'=>$request->name[$key],
                            'content'=>json_encode($data),
                            'page_type_id'=>null,
                            'page_id'=>$request->aboutUsId,
                            'show_on_home'=>1,
                            'position'=>$request->position[$key]
                        ]);

                        $imageName = $mediaHelper->uploadSingleImage($request->photo[$key]);
                        
                                Picture::create([
                                    'imageable_id' => $id->id,
                                    'imageable_type' => Page::NAMESPACE,
                                    'url' => $imageName,
                                    'is_banner'=>0
                                ]);
                    }
                    else{
                        Page::create([
                            'slug'=>Str::slug($request->name[$key]),
                            'title'=>$request->name[$key],
                            'content'=>json_encode($data),
                            'page_type_id'=>null,
                            'page_id'=>$request->aboutUsId,
                            'show_on_home'=>1,
                            'position'=>$request->position[$key]
                        ]);
                    }
                }
                else{
                    Page::create([
                        'slug'=>Str::slug($request->name[$key]),
                        'title'=>$request->name[$key],
                        'content'=>json_encode($data),
                        'page_type_id'=>null,
                        'page_id'=>$request->aboutUsId,
                        'show_on_home'=>1,
                        'position'=>$request->position[$key]
                    ]);
                }
              }
               
           }
        }

        else
        {
            foreach ($request->name as $key => $value) {

                # code...
                 $data=array();
                 $data['name']=$request->name[$key];
                 $data['designation']=$request->designation[$key];
                 $data['position']=$request->position[$key];
                 if (array_key_exists('photo',$request->all())) {
                     if (array_key_exists($key,$request->photo)) {
                     $id=Page::create([
                             'slug'=>Str::slug($request->name[$key]),
                             'title'=>$request->name[$key], 
                             'content'=>json_encode($data),
                             'page_type_id'=>null,
                             'page_id'=>$request->aboutUsId,
                             'show_on_home'=>1,
                             'position'=>$request->position[$key]
                         ]);
 
                         $imageName = $mediaHelper->uploadSingleImage($request->photo[$key]);
                         
                                 Picture::create([
                                     'imageable_id' => $id->id,
                                     'imageable_type' => Page::NAMESPACE,
                                     'url' => $imageName,
                                     'is_banner'=>0
                                 ]);
                     }
                     else{
                         Page::create([
                             'slug'=>Str::slug($request->name[$key]),
                             'title'=>$request->name[$key],
                             'content'=>json_encode($data),
                             'page_type_id'=>null,
                             'page_id'=>$request->aboutUsId,
                             'show_on_home'=>1,
                             'position'=>$request->position[$key]
                         ]);
                     }
                 }
                 else{
                     Page::create([
                         'slug'=>Str::slug($request->name[$key]),
                         'title'=>$request->name[$key],
                         'content'=>json_encode($data),
                         'page_type_id'=>null,
                         'page_id'=>$request->aboutUsId,
                         'show_on_home'=>1,
                         'position'=>$request->position[$key]
                     ]);
                 }
 
            
         }
        }
           # code...
        
        return redirect()->route('aboutus.index')->with('msg','About Us Content Created successfully');
    }

    public function storeOtherDetail(Request $request)
    {
       $request->validate([
            'name.*'=>'required',
            'designation.*'=>'required',
            'position'=>'required'
        ]);

        foreach ($request->name as $key => $value) {
           $picture= Page::query()->where('id',$value)->with('pictures')->first();
           $name= Page::query()->where('id',$value)->first()->title;
           $data=array();
           $data['name']=$name;
           $data['designation']=$request->designation[$key];
           $data['position']=$request->position[$key];
           foreach ($picture->pictures as $keyy => $photo) {
           $id= Page::create([
                'slug'=>Str::slug($request->name[$key]),
                'title'=>$name,
                'content'=>json_encode($data),
                'page_type_id'=>null,
                'page_id'=>$request->aboutUsId,
                'show_on_home'=>1,
                'position'=>$request->position[$key]
            ]); 
            

            Picture::create([
                'imageable_id' => $id->id,
                'imageable_type' => Page::NAMESPACE,
                'url' => $photo->url,
                'is_banner'=>0
            ]);
           }
           

        }
        return redirect()->route('aboutus.index')->with('msg','About Us Content Created successfully');

    }

    public function showDetail($aboutus)
    {
        $id=$aboutus;
        $title=Page::find($aboutus)->title;
        $aboutus=Page::query()->where('page_id',$aboutus)->orderBy('position','ASC')->with('pictures')->get();
        return view('about-us.show-detail',['aboutus'=>$aboutus,'title'=>$title,'id'=>$id]);
    }

    public function editDetail(Page $aboutus)
    {   
        $aboutus->load('pictures');
        return view('about-us.edit-detail',['aboutus'=>$aboutus]);
    }

    public function updateDetail (Request $request,MediaHelper $mediaHelper)
    {
        $aboutus=Page::query()->where('id',$request->aboutUsId)->first()->load('pictures');
        $data= $request->validate([
            'name'=>'required',
            'designation'=>'required',
        ]);
        $data=array();
        $data['name']=$request->name;
        $data['designation']=$request->designation;
        $data['position']=$request->position;
        DB::transaction(function () use ($request, $mediaHelper,$aboutus) {

       if ($request->hasFile('photo')) {
          foreach ($aboutus->pictures as $key => $value) {
              if (File::exists(public_path('storage/thumbnails/' . $value->url))) {
            File::delete(public_path('storage/thumbnails/' . $value->url));
            File::delete(public_path('storage/upload/' . $value->url));
            }
             $value->delete();
             $imageName = $mediaHelper->uploadSingleImage($request->photo);
             Picture::create([
                'imageable_id' => $request->aboutUsId,
                'imageable_type' => Page::NAMESPACE,
                'url' => $imageName,
                'is_banner'=>0
            ]);
          }
       }
    });
       Page::query()->where('id',$request->aboutUsId)->update([
        'slug'=>Str::slug($request->name),
        'title'=>$request->name,
        'content'=>json_encode($data),
       ]);
       return redirect()->route('aboutus.index')->with('msg','Detail Updated successfully');

    }

    public function aboutUsDelete(Page $aboutus)
    {
        $picture= $aboutus->load('pictures');
        $photo=$picture->pictures()->first()->url;
        $aboutus->delete();
       return redirect()->route('aboutus.index')->with('msg','Detail Deleted successfully');
    }

    //-------------Get Requests-------------------
    public function deleteStaff(Request $request)
    {
      Page::query()->where('id',$request->id)->delete();
    }

    public function getStaffData(Request $request)
    {
        $data=Page::query()->where('id',$request->id)->first();
        return response()->json($data);   
    }

    public function getAlumniData(Request $request)
    {
        $data= Page::query()->where('id',$request->id)->first();
        return response()->json($data);
    }
    //-------------Get Requests-------------------

}
