<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Models\Dean;
use Session;

class DeanController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $deans = Dean::orderBy('id', 'DESC')->get();
    return view('backend.pages.dean.index', compact('deans'));
  }


  public function create()
  {
    return view('backend.pages.dean.create');
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'first_name' => 'required',
      'designation' => 'required',
      'image' => 'required',
      'message' => 'required',
    ]);

    $dean = new Dean();
    $dean->first_name = $request->first_name;
    $dean->last_name = $request->last_name;
    $dean->email = $request->email;
    $dean->phone_no = $request->phone_no;
    $dean->designation = $request->designation;
    $dean->message = $request->message;
    if($request->status == 1){
      $dean->status = 1;
    }
    elseif($request->status == 0 || $request->status == null){
      $dean->status = 0;
    }
    $dean->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/deans');
    $dean->save();

    session()->flash('success', 'Dean information added successfully !!!');
    return redirect()->route('admin.dean.index');
  }


  /**
   * [return dean edit page with dean data]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function edit($id)
  {
    $dean = Dean::find($id);
    return view('backend.pages.dean.edit', compact('dean'));
  }


  /**
   * [update all dean data]
   * @param  Request $request [description]
   * @param  [type]  $id      [description]
   * @return [type]           [description]
   */
  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'first_name' => 'required',
      'designation' => 'required',
      'message' => 'required',
    ]);

    $dean = Dean::find($id);
    $dean->first_name = $request->first_name;
    $dean->last_name = $request->last_name;
    $dean->email = $request->email;
    $dean->phone_no = $request->phone_no;
    $dean->designation = $request->designation;
    $dean->message = $request->message;
    if($request->status == 1){
      $dean->status = 1;
    }
    elseif($request->status == 0 || $request->status == null){
      $dean->status = 0;
    }

    // image has or not in the form
    // has image
    if(!is_null($request->image)){
      // update
      $dean->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/deans', $dean->image);
    }
    $dean->save();

    session()->flash('success', 'Dean information updated successfully !!!');
    return redirect()->route('admin.dean.index');
  }


  /**
   * [delete dean]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function destroy($id)
  {
    $dean = Dean::find($id);
    if(!is_null($dean->image)){
      ImageUploadHelper::delete('public/images/deans/'.$dean->image);
    }
    $dean->delete();
    session()->flash('error', 'Dean information deleted successfully !!!');
    return redirect()->route('admin.dean.index');
  }


  public function presentDean($id)
  {
    Dean::where('id', $id)->update(['status' => 1]);
    session('flash', 'Promoted as a present dean successfully !!!');
    return redirect()->route('admin.dean.index');
  }


  public function previousDean($id)
  {
    Dean::where('id', $id)->update(['status' => 0]);
    session('flash', 'Promoted as a previous dean successfully !!!');
    return redirect()->route('admin.dean.index');
  }
}
