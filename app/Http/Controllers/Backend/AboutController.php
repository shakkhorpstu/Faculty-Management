<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use Session;

class AboutController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  /**
   * [return to about details page with all data of first row]
   * @return [type] [description]
   */
  public function index()
  {
    $about = About::first();
    return view('backend.pages.about.index', compact('about'));
  }



  /**
   * [ return to about create form page
   * if about has data => return with data
   * else return with empty array ]
   * @return [type] [description]
   */
  public function create()
  {
    $about = About::first();
    if(is_null($about)){
      $about = array();
    }
    return view('backend.pages.about.create', compact('about'));
  }



  /**
   * [store all the data that user request to store
   * if about has data => then update with data
   * else create new object & store data ]
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'overview' => 'required',
      'vision' => 'required',
    ]);

    if(About::first()){
      $about = About::first();
    }
    else{
      $about = new About();
    }

    $about->overview = $request->overview;
    $about->vision = $request->vision;
    $about->save();

    session()->flash('success', 'About information updated successfully');
    return redirect()->route('admin.about.index');
  }
}
