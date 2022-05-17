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
use App\Http\Helper\MediaHelper;
use DB;
use Illuminate\Support\Str;
use File;




class ArticleController extends Controller
{
    public $slug;
    public $contactUs;
    public $pageType;
    public function __construct()
    {
        $this->slug='article';
        $this->pageType=PageType::query()->where('slug',$this->slug)->first();
    }
    public function index()
    {
         return view('article.article-list', [
            'article' => $this->pageType == null ? '' : $this->pageType->load('pages')
        ]);
    }
    
    public function create()
    {
        return view('article.article-add');
    }
    
    public function store(Request $request, MediaHelper $mediaHelper)
    {
        
        $data=$request->validate([
            'writer_name'=>'required',
            'writer_description'=>'required',
            'article_cover_image'=>'required',
            'article_title'=>'required',
            'article_date'=>'required',
            'article_content'=>'required',
            'writer_image'=>'required'
            ]);
                DB::transaction(function () use ($request, $mediaHelper,$data) {
                    if($request->hasFile('article_cover_image')){
                        $article_cover_image=$mediaHelper->uploadSingleImage($request->article_cover_image);
                    }
                     if($request->hasFile('writer_image')){
                        $writer_image=$mediaHelper->uploadSingleImage($request->writer_image);
                    }
                    $data['article_cover_image']=$article_cover_image;
                    $data['writer_image']=$writer_image;
                    // dd($data);
                    
                   $id= Page::create([
                        'slug'=>Str::slug($request->article_title),
                        'title'=>$request->article_title,
                        'page_type_id'=>$this->pageType->id,
                        'show_on_home'=>0,
                        'content'=>json_encode($data)
                        ]);
                });
       return redirect()->route('article.index')->with('msg','Article Created Sucessfully');

    }
    
    public function edit(Page $article)
    {
        
        return view('article.article-edit',compact('article'));
    }
    
    public function update(Request $request,Page $article,MediaHelper $mediaHelper)
    {
         $data=$request->validate([
            'writer_name'=>'required',
            'writer_description'=>'required',
            'article_title'=>'required',
            'article_date'=>'required',
            'article_content'=>'required',
            ]);
            
        $old_content= json_decode($article->content);
        $old_article_cover_image= $old_content->article_cover_image;
        $old_writer_image= $old_content->writer_image;
        

        DB::transaction(function () use ($request, $mediaHelper,$data,$old_article_cover_image,$old_writer_image,$article) {
                    if($request->hasFile('article_cover_image')){
                        $article_cover_image=$mediaHelper->uploadSingleImage($request->article_cover_image);
                    }
                     if($request->hasFile('writer_image')){
                        $writer_image=$mediaHelper->uploadSingleImage($request->writer_image);
                    }
                    $data['article_cover_image']=isset($article_cover_image)? $article_cover_image: $old_article_cover_image;
                    $data['writer_image']=isset($writer_image)? $writer_image: $old_writer_image;
                    
                    
                    $article->update([
                         'article_cover_image'=>'required',
                         'title'=>$request->article_title,
                         'content'=>json_encode($data)
                        ]);
                    
                  
                });
        return redirect()->route('article.index')->with('msg','Article Updated Sucessfully');

    }
    
    public function destroy(Page $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('msg','Article Deleted Sucessfully');
    }

    
   
}
