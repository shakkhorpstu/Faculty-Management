<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\UploadHelper;
use App\Models\Staff;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Department;
use App\Models\TeacherMaterial;

class DepartmentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }



  public function index()
  {
    $departments = Department::orderBy('id', 'DESC')->get();
    return view('backend.pages.department.index', compact('departments'));
  }



  public function create()
  {
    return view('backend.pages.department.create');
  }



  public function store(Request $request)
  {
    $department = new Department();

    $this->validate($request, [
      'name' => 'required|unique:departments',
      'short_name' => 'required|unique:departments',
    ]);

    $department->name = $request->name;
    $department->short_name = $request->short_name;
    $department->description = $request->description;
    $department->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/departments');
    $department->save();

    session()->flash('success', 'Department information added successfully !!!');
    return redirect()->route('admin.department.index');
  }



  public function edit($id)
  {
    $department = Department::find($id);
    return view('backend.pages.department.edit', compact('department'));
  }



  public function update(Request $request, $id)
  {
    $department = Department::find($id);

    $this->validate($request, [
      'name' => 'required|unique:departments,name,'.$department->id,
      'short_name' => 'required|unique:departments,short_name,'.$department->id,
    ]);

    $department->name = $request->name;
    $department->short_name = $request->short_name;
    $department->description = $request->description;
    if(!is_null($request->image)){
      if(!is_null($department->image)){
        $department->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/departments', $department->image);
      }
      else{
        $department->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/departments');
      }
    }
    $department->save();

    session()->flash('success', 'Department information added successfully !!!');
    return redirect()->route('admin.department.index');
  }


  public function destroy($id)
  {
    $department = Department::find($id);
    if(!is_null($department->image)){
      ImageUploadHelper::delete('public/images/departments/'.$department->image);
    }

    $teachers = Teacher::where('department_id', $id)->get();
    if(count($teachers) > 0){
      foreach($teachers as $teacher){
        if(!is_null($teacher->image)){
          ImageUploadHelper::delete('public/images/teachers/'.$teacher->image);
        }
        $teacher->delete();
      }
    }

    $staffs = Staff::where('department_id', $id)->get();
    if(count($staffs) > 0){
      foreach($staffs as $staff){
        if(!is_null($staff->image)){
          ImageUploadHelper::delete('public/images/staffs/'.$staff->image);
        }
        $staff->delete();
      }
    }

    $courses = Course::where('department_id', $id)->get();
    if(count($courses) > 0){
      foreach($courses as $course){
        $materials = TeacherMaterial::where('course_id', $course->id)->get();
        if(count($materials) > 0){
          foreach($materials as $material){
            UploadHelper::delete('public/files/materials/'.$material->file);
            $material->delete();
          }
        }
        $course->delete();
      }
    }

    $department->delete();
    session()->flash('error', 'Department information deleted successfully !!!');
    return redirect()->route('admin.department.index');
  }
}
