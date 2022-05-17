<?php

namespace App\Http\Controllers;

use App\Mail\feedback;
use App\Models\Feedbacks;
use App\Models\Page;
use App\Models\PageType;
use App\Models\visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class FrontendController extends Controller
{
    public $pages;
    public function __construct()
    {
        $this->pages = PageType::query()->get();
    }
    public function home()
    {
        $pages = PageType::query()->with('pages.pictures','pages.Parents')->get();

        $notice= Page::query()->where('page_type_id',5)->take(3)->orderBy('id','DESC')->get();
        if (visitor::query()->where('ip', request()->ip())->count() == 0) {
            visitor::create(['ip' => request()->ip()]);
        }
        return view('frontend.frontend',['pages'=>$pages,'notice'=>$notice]); 
    }

    public function generalNotice($slug)
    {
        $pages = PageType::query()->with('pages.pictures','pages.Parents')->get();
        return view('frontend.general-notice',['pages'=>$pages]);
    }

    public function downloadFile($link)
    {
        $path=config('constants.path');
        return Storage::download($path.$link);
    }

    public function getFromSlug($slug)
    {
        dd($slug);
        abort_if(PageType::query()->where('slug', $slug)->count() == 0, 404);
        if($slug=='article')
        {
            $latestArticle= Page::query()->where('page_type_id',14)->latest()->first();
            $allArticle= Page::query()->where('page_type_id',14)->orderBy('id','DESC')->paginate(10);
             $pages = PageType::query()
            ->with('pages.pictures')
            ->get();
            return view('frontend.article',[
                'latestArticle'=>$latestArticle,
                'allArticle'=>$allArticle,
                'pages'=>$this->pages->load('pages.pictures','pages.Parents'),
                'slug'=>$slug
            ]);
        }

        if ($slug=='notice-board' || $slug=='result' || $slug=='downloads') {
            $temp = PageType::query()->where('slug',$slug)->first();
            if ($temp!=null) {
                $datas = Page::query()
                ->where('page_type_id',$temp->id)
                ->with('pictures','Parents.pictures')
                ->orderBy('id','DESC')
                ->paginate(4);

            return view('frontend.'.$slug, [
                'pages' => $this->pages->load('pages.pictures','pages.Parents'),
                'slug' => $slug,
                'datas'=>$datas
            ]);
            }
        }
        return view('frontend.'.$slug, ['pages' => $this->pages->load('pages.pictures','pages.Parents'), 'slug' => $slug]);
    }

    public function getFromProgramSlug($slug)
    {
        abort_if(!Page::query()->where('slug', $slug)->count(), 404);
        $program=Page::query()
        ->where('slug',$slug)
        ->with('pictures','Parents.pictures')
        ->first();
        
        if ($slug=='instituional-overview' || $slug =='organizational-structure' || $slug =='school-management-team' || $slug=='staff-directories' || $slug=='board-members') {
            $temp = Page::query()->where('slug',$slug)->first();
            if ($temp!=null) {
            $paginations = Page::query()->where('page_id',$temp->id)->with('pictures','Parents.pictures')->paginate(5);
            return view('frontend.'.$slug, ['pages' => $this->pages->load('pages.pictures','pages.Parents'), 'slug' => $slug,'program'=>$program,'paginations'=>$paginations]);
            }
        }
        
        return view('frontend.'.$slug, ['pages' => $this->pages->load('pages.pictures','pages.Parents'), 'slug' => $slug,'program'=>$program]);
    }

    public function subGallery($slug)
    {
        $pages = PageType::query()
            ->with('pages.pictures','pages.Parents')
            ->get();

        $program=Page::query()->where('slug',$slug)->with('pictures','Parents.pictures')->first();
        return view('frontend.sub-gallery',['program'=>$program,'pages'=>$pages]);
    }

    public function feedback(Request $request)
    {
       $data= $request->validate([
            'name'=>'required',
            'email'=>'required',
            'feedback'=>'required'
        ]);
        DB::beginTransaction();

        try {
            Feedbacks::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'comments'=>$request->feedback
            ]);
            // $mail='admission@adarshaschool.edu.np';
            $mail='ashish.pandey2073@gmail.com';
            
            
            Mail::to($mail)->send(new feedback($data));
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }
       
        return redirect()->back()->with('msg','Feedback given sucessfully');
    }

    public function singleNotice($slug)
    {
        $pages = PageType::query()
        ->with('pages.pictures','pages.Parents')
        ->get();
        $program=Page::query()->where('slug',$slug)->with('pictures','Parents.pictures')->first();
        return view('frontend.single-notice',['program'=>$program,'pages'=>$pages]);
    }
    
    
    public function singleArticle($slug)
    {
        $pages = PageType::query()
        ->with('pages.pictures','pages.Parents')
        ->get();
        $article=Page::query()->where('slug',$slug)->with('pictures','Parents.pictures')->first();
        // dd($article);
        return view('frontend.single-article',['article'=>$article,'pages'=>$pages]);
    }

    


}
