<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Session;
use Auth;
use Hash;

class PagesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    return view('backend.pages.index');
  }


  public function changePasswordForm()
  {
    return view('backend.pages.changePassword');
  }


  public function changePassword(Request $request)
  {
    $this->validate($request,[
      'old_password' => 'required',
      'new_password' => 'required',
      'confirm_password' => 'required',
    ]);

    $check = Hash::check($request->old_password, Auth::guard('admin')->User()->password);
    if($check){
      if($request->new_password != $request->confirm_password){
        session()->flash('confirm_password', 'New password & confirm password does not match !!!');
        return redirect()->route('admin.changePassword');
      }
      else{
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin->password = Hash::make($request->new_password);
        $admin->save();
        session()->flash('success', 'Password updated successfully !!!');
        return redirect()->route('admin.dashboard');
      }
    }
    else{
      session()->flash('old_password', 'Old password does not match !!!');
      return redirect()->route('admin.changePassword');
    }
  }
}
