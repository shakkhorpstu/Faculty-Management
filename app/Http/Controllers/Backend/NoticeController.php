<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UploadHelper;
use App\Helpers\StringHelper;
use App\Models\Notice;
use Session;

class NoticeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $notices = Notice::orderBy('id', 'DESC')->get();
    return view('backend.pages.notice.index', compact('notices'));
  }


  public function create()
  {
    return view('backend.pages.notice.create');
  }


  public function store(Request $request)
  {
    $notice = new Notice();

    $this->validate($request, [
      'title' => 'required',
      'notice_news_event' => 'required|numeric',
    ]);

    $notice->title = $request->title;
    $notice->notice_news_event = $request->notice_news_event;
    $notice->description = $request->description;
    $notice->slug = StringHelper::createSlug($request->title, 'Notice', 'slug');
    if($request->status == 1){
      $notice->status = 1;
    }
    elseif($request->status == 0 || $request->status == null){
      $notice->status = 0;
    }
    if(!is_null($request->file)){
      $notice->file = UploadHelper::upload('file', $request->file('file'), time(), 'public/files/notices');
    }
    $notice->save();

    session()->flash('success', 'Notice information added successfully !!!');
    return redirect()->route('admin.notice.index');
  }


  public function edit($id)
  {
    $notice = Notice::find($id);
    return view('backend.pages.notice.edit', compact('notice'));
  }


  public function update(Request $request, $id)
  {
    $notice = Notice::find($id);

    $this->validate($request, [
      'title' => 'required',
      'notice_news_event' => 'required|numeric',
    ]);

    $notice->title = $request->title;
    $notice->notice_news_event = $request->notice_news_event;
    $notice->description = $request->description;
    $notice->slug = StringHelper::createSlug($request->title, 'Notice', 'slug');
    if($request->status == 1){
      $notice->status = 1;
    }
    elseif($request->status == 0 || $request->status == null){
      $notice->status = 0;
    }
    if(!is_null($request->file)){
      if(!is_null($notice->file)){
        $notice->file = UploadHelper::update('file', $request->file('file'), time(), 'public/files/notices', $notice->file);
      }
      else{
        $notice->file = UploadHelper::upload('file', $request->file('file'), time(), 'public/files/notices');
      }
    }
    $notice->save();

    session()->flash('success', 'Notice information updated successfully !!!');
    return redirect()->route('admin.notice.index');
  }


  public function destroy($id)
  {
    $notice = Notice::find($id);
    if(!is_null($notice->file)){
      UploadHelper::delete('public/files/notices/'.$notice->file);
    }
    $notice->delete();
    session()->flash('error', 'Notice information deleted successfully !!!');
    return redirect()->route('admin.notice.index');
  }


  public function publish($id)
  {
    Notice::where('id', $id)->update(['status' => 1]);
    session()->flash('success', 'Notice published successfully !!!');
    return redirect()->route('admin.notice.index');
  }


  public function unpublish($id)
  {
    Notice::where('id', $id)->update(['status' => 0]);
    session()->flash('error', 'Notice unpublished !!!');
    return redirect()->route('admin.notice.index');
  }
}
