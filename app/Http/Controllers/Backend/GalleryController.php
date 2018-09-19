<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\StringHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\Gallery;
use Session;

class GalleryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $galleries = Gallery::orderBy('id', 'DESC')->get();
    return view('backend.pages.gallery.index', compact('galleries'));
  }



  public function store(Request $request)
  {
    $gallery = new Gallery();

    $this->validate($request, [
      'title' => 'required',
      'image' => 'required',
    ]);

    $gallery->title = $request->title;
    $gallery->slug = StringHelper::createSlug($request->title, 'Gallery', 'slug');
    $gallery->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/galleries');
    $gallery->save();

    session()->flash('success', 'Image successfully add to gallery !!!');
    return redirect()->route('admin.gallery.index');
  }



  public function update(Request $request, $id)
  {
    $gallery = Gallery::find($id);

    $this->validate($request, [
      'title' => 'required',
      'image' => 'required',
    ]);

    $gallery->title = $request->title;
    $gallery->slug = StringHelper::createSlug($request->title, 'Gallery', 'slug');
    if(!is_null($request->image)){
      if(!is_null($gallery->image)){
        $gallery->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/galleries', $gallery->image);
      }
      else{
        $gallery->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/galleries');
      }
    }
    $gallery->save();

    session()->flash('success', 'Gallery informatiom updated successfully !!!');
    return redirect()->route('admin.gallery.index');
  }



  public function destroy($id)
  {
    $gallery = Gallery::find($id);
    if($gallery->image){
      ImageUploadHelper::delete('public/images/galleries/'.$gallery->image);
    }
    $gallery->delete();
    session()->flash('error', 'Image successfully deleted from gallery !!!');
    return redirect()->route('admin.gallery.index');
  }
}
