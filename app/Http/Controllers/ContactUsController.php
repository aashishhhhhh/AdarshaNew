<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Models\Page;
use App\Models\PageType;
use Illuminate\Http\Request;
use Mockery\Matcher\Contains;
use phpDocumentor\Reflection\PseudoTypes\True_;
use SebastianBergmann\Type\VoidType;
use Illuminate\Support\Str;


class ContactUsController extends Controller
{
    public $slug;
    public $contactUs;
    public $pageType;
    public function __construct()
    {
        $this->slug='contact-us';
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
    }
    public function index()
    {
        $this->contactUs=Page::query()->where('slug',$this->slug)->first();
        if ($this->contactUs==null) {
            $content=null;
            return view('contact-us.contact-us',compact('content'));
        }
        else{
            $this->contactUs=Page::query()->where('slug',$this->slug)->first();
            $content=json_decode($this->contactUs->content,True);
            return view('contact-us.contact-us',compact('content'));
        }
   
    }

    public function create()
    {
        $page= Page::query()->where('slug',$this->slug)->first();
        if ($page==null) {
            return view('contact-us.contact-us-add');
        }
        else{
            return redirect()->route('contactUs-edit');
        }
    }

    public function store(ContactUsRequest $request)
    {
        
        $data=$request->validate([
            'school_contact_no'=>'required',
            'email'=>'required',
            'principle_contact_no'=>'required',
            'school_co_contact_no'=>'required'
        ]);

        Page::create([
            'slug'=>$this->slug,
            'title'=>strtoupper($this->slug),
            'show_on_home'=>1,
            'page_type_id'=>$this->pageType->id
        ]);

        $request=json_encode($data);
        Page::query()->where('slug',$this->slug)->update([
            'content'=>$request
        ]);
        return redirect()->route('contactUs.index')->with('msg','About Us Content inserted successfully');
    }

    public function contactUsEdit()
    {
        $contactUs=Page::query()->where('slug',$this->slug)->first();
        $content=json_decode($contactUs->content,True);
        return view('contact-us.contact-us-edit',compact('content'));
    }

    public function updatee(ContactUsRequest $request)
    {
        $request=json_encode($request->except('_token'));
        Page::query()->where('slug',$this->slug)->update([
            'content'=>$request
        ]);       
        return redirect()->route('contactUs.index')->with('msg','About Us Content updated successfully');
    }
    
    public function settingList ()
    {
         $pageType= PageType::query()->where('slug','contact')->first();
        $settings= Page::query()->where('page_type_id',$pageType->id)->get();
       return view('contact-us.site-setting-list',['settings'=>$settings]);

    }
    
    public function settingShow()
    {
       
        return view('contact-us.site-setting-add');
    }
    
    public function settingAdd(Request $request)
    {
       
    $pageType= PageType::query()->where('slug','contact')->first();
    
    Page::create([
        'slug'=>strtoupper($request->title),
        'title'=>$request->title,
        'content'=>json_encode($request->all()),
        'show_on_home'=>0,
        'page_type_id'=>$pageType->id
        ]);
    return redirect()->route('site-setting-list')->with('msg','Site Setting Created');
   
    }
    
    public function settingEdit(Page $page)
    {
        return view('contact-us.site-setting-edit',compact('page'));
    }
    
    public function settingUpdate(Request $request)
    {
       Page::query()->where('id',$request->id)->update([
        'slug'=>strtoupper($request->title),
        'title'=>$request->title,
        'content'=>json_encode($request->all()),
        ]);
        return redirect()->route('site-setting-list')->with('msg','Site Setting Updated');

        
    }
    
    public function settingDelete(Page $page)
    {
        $page->delete();
        return redirect()->route('site-setting-list')->with('msg','Site Setting Deleted');

    }

    public function userful_links ()
    {
        $pageType= PageType::query()->where('slug','link')->first();
        $links= Page::query()->where('page_type_id',$pageType->id)->get();
        return view('contact-us.site-setting-userful-links',['links'=>$links]);
    }

    public function userful_links_add()
    {
        return view('contact-us.site-setting-userful-links-add');
    }

    public function userful_links_create(Request $request)
    {
        $pageType= PageType::query()->where('slug','link')->first();
        Page::create([
            'slug'=>strtoupper($request->title),
            'title'=>$request->title,
            'content'=>json_encode($request->all()),
            'show_on_home'=>0,
            'page_type_id'=>$pageType->id
            ]);
        return redirect()->route('useful_links')->with('msg','Site Setting Created');

    }

    public function userful_links_edit($id)
    {
        $link= Page::query()->where('id',$id)->first();
        return view('contact-us.site-setting-userful-links-edit',['link'=>$link]);
    }

    public function userful_links_update(Request $request)
    {
        Page::query()->where('id',$request->id)->update([
            'slug'=>strtoupper($request->title),
            'title'=>$request->title,
            'content'=>json_encode($request->all()),
            ]);
        return redirect()->route('useful_links')->with('msg','Site Setting Updated');

    }

    public function userful_links_delete($id)
    {
        $link= Page::query()->where('id',$id)->delete();
        return redirect()->route('useful_links')->with('msg','Site Setting Deleted');

    }

    public function school_address()
    {
        $pageType= PageType::query()->where('slug','school-address')->first();
        $address= Page::query()->where('page_type_id',$pageType->id)->get();
        return view('contact-us.site-setting-school_address',compact('address'));
    }

    public function school_address_add()
    {
        $data=array();
        $name='Adarsha Secondary School';
        $address='Biratnagar-9, Morang, Nepal';
        $post_box= '123';

        $data['name']=$name;
        $data['address']=$address;
        $data['post_box']=$post_box;

        $encode= json_encode($data);
        $pageType= PageType::query()->where('slug','school-address')->first();
        Page::create([
            'title'=>$name,
            'slug'=>Str::slug($name),
            'content'=>$encode,
            'show_on_home'=>0,
            'page_type_id'=>$pageType->id
        ]);
        return redirect()->route('school_address')->with('msg','Site Setting Added');

    }
    

    public function school_address_edit(Page $address)
    {
        return view('contact-us.site-setting-school_address-edit',compact('address'));
    }

    public function school_address_update(Request $request)
    {
        $address= Page::query()->where('id',$request->id)->first();
        $address->update([
            'title'=>$request->name,
            'slug'=>Str::slug($request->name),
            'content'=>json_encode($request->all())
        ]);
        return redirect()->route('school_address')->with('msg','Site Setting Updated');
        
    }
    
    public function school_address_delete(Page $address)
    {
        $address->delete();
        return redirect()->route('school_address')->with('msg','Site Setting Deleted');
    }

   
}
