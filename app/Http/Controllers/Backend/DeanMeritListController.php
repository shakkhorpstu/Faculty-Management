<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\StringHelper;
use App\Helpers\ImageUploadHelper;
use App\Models\DeanMeritList;
use Session;

class DeanMeritListController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $merits = DeanMeritList::orderBy('id', 'DESC')->get();
    return view('backend.pages.deanMeritList.index', compact('merits'));
  }



  public function create()
  {
    return view('backend.pages.deanMeritList.create');
  }



  public function store(Request $request)
  {
    $this->validate($request, [
      'first_name' => 'required',
      'cgpa' => 'required',
    ]);

    $merit = new DeanMeritList();
    $merit->first_name = $request->first_name;
    $merit->last_name = $request->last_name;
    $merit->email = $request->email;
    $merit->phone = $request->phone_no;
    $merit->cgpa = $request->cgpa;
    $merit->username = StringHelper::createSlug($request->first_name, 'DeanMeritList', 'username');
    $merit->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/meritLists');
    $merit->save();

    session()->flash('success', 'Merit list updated successfully !!!');
    return redirect()->route('admin.deanMeritList.index');
  }



  public function edit($id)
  {
    $merit = DeanMeritList::find($id);
    return view('backend.pages.deanMeritList.edit', compact('merit'));
  }



  public function update(Request $request, $id)
  {
    $merit = DeanMeritList::find($id);

    $this->validate($request, [
      'first_name' => 'required',
      'cgpa' => 'required',
    ]);

    $merit->first_name = $request->first_name;
    $merit->last_name = $request->last_name;
    $merit->email = $request->email;
    $merit->phone = $request->phone_no;
    $merit->cgpa = $request->cgpa;
    $merit->username = StringHelper::createSlug($request->first_name, 'DeanMeritList', 'username');
    if(!is_null($request->image)){
      if(!is_null($merit->image)){
        $merit->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/meritLists', $merit->image);
      }
      else{
        $merit->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/meritLists');
      }
    }
    $merit->save();

    session()->flash('success', 'Merit list updated successfully !!!');
    return redirect()->route('admin.deanMeritList.index');
  }



  public function destroy($id)
  {
    $merit = DeanMeritList::find($id);
    if($merit->image){
      ImageUploadHelper::delete('public/images/meritLists/'.$merit->image);
    }
    $merit->delete();
    session()->flash('error', 'Information deleted successfully !!!');
    return redirect()->route('admin.deanMeritList.index');
  }
}
