<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\StringHelper;
use App\Helpers\UploadHelper;
use App\Models\Download;
use Session;

class DownloadController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $downloads = Download::orderBy('id', 'DESC')->get();
    return view('backend.pages.download.index', compact('downloads'));
  }


  public function store(Request $request)
  {
    $download = new Download();

    $this->validate($request, [
      'title' => 'required',
      'type' => 'required|numeric',
      'file' => 'required',
    ]);

    $download->title = $request->title;
    $download->type = $request->type;
    $download->slug = StringHelper::createSlug($request->title, 'Download', 'slug');
    $download->file = UploadHelper::upload('file', $request->file('file'), time(), 'public/files/downloads');
    $download->save();

    session()->flash('success', 'File information added successfully !!!');
    return redirect()->route('admin.download.index');
  }


  public function update(Request $request, $id)
  {
    $download = Download::find($id);

    $this->validate($request, [
      'title' => 'required',
      'type' => 'required|numeric',
    ]);

    $download->title = $request->title;
    $download->type = $request->type;
    $download->slug = StringHelper::createSlug($request->title, 'Download', 'slug');
    if(!is_null($request->file)){
      if(!is_null($download->file)){
        $download->file = UploadHelper::update('file', $request->file('file'), time(), 'public/files/downloads', $download->file);
      }
      else{
        $download->file = UploadHelper::upload('file', $request->file('file'), time(), 'public/files/downloads');
      }
    }
    $download->save();

    session()->flash('success', 'File information updated successfully !!!');
    return redirect()->route('admin.download.index');
  }



  public function destroy($id)
  {
    $download = Download::find($id);
    if($download->file){
      UploadHelper::delete('public/files/downloads/'.$download->file);
    }
    $download->delete();
    session()->flash('error', 'File information deleted successfully !!!');
    return redirect()->route('admin.download.index');
  }
}
