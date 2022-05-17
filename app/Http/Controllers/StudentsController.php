<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public $slug;
    public $page;
    public function __construct()
    {
        $this->slug='former-students';
        $this->page=Page::query()->where('slug',$this->slug)->first();
    }

    public function index()
    {
        return view('student.student');
    }
}
