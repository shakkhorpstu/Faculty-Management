<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\StringHelper;
use App\Models\Staff;
use App\Models\Department;
use Sessioin;

class StaffController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $staffs = Staff::orderBy('id', 'DESC')->get();
    $departments = Department::orderBy('short_name', 'ASC')->get();
    return view('backend.pages.staff.index', compact('staffs', 'departments'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'designation' => 'required',
      'department_id' => 'required',
    ]);

    $staff = new Staff();
    $staff->name = $request->name;
    $staff->email = $request->email;
    $staff->department_id = $request->department_id;
    $staff->designation = $request->designation;
    $staff->phone = $request->phone;
    $staff->username = StringHelper::createSlug($request->name, 'Staff', 'username');
    $staff->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/staffs');
    $staff->save();

    session()->flash('success', 'Staff information added successfully !!!');
    return redirect()->route('admin.staff.index');
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'designation' => 'required',
      'department_id' => 'required',
    ]);

    $staff = Staff::find($id);
    $staff->name = $request->name;
    $staff->email = $request->email;
    $staff->department_id = $request->department_id;
    $staff->designation = $request->designation;
    $staff->phone = $request->phone;
    $staff->username = StringHelper::createSlug($request->name, 'Staff', 'username');
    if(!is_null($request->image)){
      if(!is_null($staff->image)){
        $staff->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/staffs', $staff->image);
      }
      else{
        $staff->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/staffs');
      }
    }
    $staff->save();

    session()->flash('success', 'Staff information updated successfully !!!');
    return redirect()->route('admin.staff.index');
  }


  public function destroy($id)
  {
    $staff = Staff::find($id);
    if(!is_null($staff->image)){
      ImageUploadHelper::delete('public/images/staffs/'.$staff->image);
    }
    $staff->delete();
    session()->flash('error', 'Staff information deletd successfully !!!');
    return redirect()->route('admin.staff.index');
  }


  public function departmentSatff($id)
  {
    $staffs = Staff::where('department_id', $id)->get();
    $departments = Department::orderBy('short_name', 'ASC')->get();
    return view('backend.pages.staff.index', compact('staffs', 'departments'));
  }
}
