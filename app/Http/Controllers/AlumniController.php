<?php

namespace App\Http\Controllers;

use App\Http\Helper\MediaHelper;
use App\Models\Page;
use App\Models\PageType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class AlumniController extends Controller
{

  public $slug = 'alumni';
  public $pageType;

  public function __construct()
  {
    $this->pageType = PageType::query()->where('slug', $this->slug)->orderBy('id', 'ASC')->first();
  }

  public function index()
  {
    return view('alumni.alumni-list', [
      'alumni' => $this->pageType == null ? '' : $this->pageType->load('pages')
    ]);
  }

  public function alumni_from_store(Request $request, MediaHelper $mediaHelper)
  {

    $data = $request->validate([
      'name' => 'required',
      'p_address' => 'required',
      'c_address' => 'required',
      'current_job' => 'sometimes',
      'designation' => 'sometimes',
      'office' => 'sometimes',
      'contact_no' => 'required',
      'starting_year' => 'required',
      'leaving_year' => 'required',
      'image' => 'required|image|mimes:jpg,png,jpeg,',
      "starting_class" => "required",
      "leaving_class" => "required"
    ]);


    if ($request->hasFile('image')) {
      $image = $mediaHelper->uploadSingleImage($request->image);
      $data['image'] = $image;

      Page::create([
        'slug' => Str::slug($request->name),
        'title' => $request->name,
        'content' => json_encode($data),
        'page_type_id' => $this->pageType->id,
        'show_on_home' => 1,
        'is_approved' => 0,
      ]);
    }

    return redirect()->back()->with('msg', 'Your form is submitted. Thank you');
  }

  public function alumni_form_approve(Page $alumni)
  {
    $alumni->update([
      'is_approved' => 1
    ]);
    return redirect()->route('alumni.index')->with('msg', 'Alumni request approved');
  }

  public function alumni_form_decline(Page $alumni)
  {
    $alumni->update([
      'is_approved' => 2
    ]);
    return redirect()->route('alumni.index')->with('msg', 'Alumni request declined');
  }

  public function destroy($id)
  {
    $alumni = Page::query()->where('id', $id)->first();
    $image = json_decode($alumni->content);
    if (File::exists(public_path('storage/upload/' . $image->image))) {
      File::delete(public_path('storage/upload/' . $image->image));
    }

    $alumni->delete();

    return redirect()->route('alumni.index')->with('msg', 'Alumni request deleted');
  }
}
