<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Academic;

class AcademicController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  /**
   * [return to academic details page with all data of first row]
   * @return [type] [description]
   */
  public function index()
  {
    $academic = Academic::first();
    return view('backend.pages.academic.index', compact('academic'));
  }



  /**
   * [ return to academic create form page
   * if academic has data => return with data
   * else return with empty array ]
   * @return [type] [description]
   */
  public function create()
  {
    $academic = Academic::first();
    if(is_null($academic)){
      $academic = array();
    }
    return view('backend.pages.academic.create', compact('academic'));
  }



  /**
   * [store all the data that user request to store
   * if academic has data => then update with data
   * else create new object & store data ]
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'bsc' => 'required',
      'msc' => 'required',
      'activities' => 'required',
    ]);

    if(Academic::first()){
      $academic = Academic::first();
    }
    else{
      $academic = new Academic();
    }

    $academic->bsc = $request->bsc;
    $academic->msc = $request->msc;
    $academic->activities = $request->activities;
    $academic->scholarship = $request->scholarship;
    $academic->save();

    session()->flash('success', 'Academic information updated successfully');
    return redirect()->route('admin.academic.index');
  }
}
