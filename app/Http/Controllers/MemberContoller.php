<?php

namespace App\Http\Controllers;

use App\Models\PageType;
use Illuminate\Http\Request;

class MemberContoller extends Controller
{

    public $slug='about-us';
    public $pageType;

    public function __construct()
    {
        $this->pageType=PageType::query()->where('slug',$this->slug)->orderBy('id','ASC')->first();  
       
    }

    public function index()
    {
        $pages=$this->pageType->load('pages')->pages;
        foreach ($pages as $key => $value) {
            if ($value->slug=='board-members') {
               return view('about-us.member',['aboutus'=>$value]);
            }
        }
    }


}
