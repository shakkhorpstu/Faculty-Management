<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\AccountCreateNotification;
use App\Notifications\AccountUpdateNotification;
use App\Helpers\ImageUploadHelper;
use App\Helpers\UploadHelper;
use App\Helpers\StringHelper;
use Session;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\TeacherMaterial;
use Hash;

class TeacherController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $teachers = Teacher::orderBy('id', 'DESC')->get();
    return view('backend.pages.teacher.index', compact('teachers'));
  }


  public function create()
  {
    $departments = Department::orderBy('short_name', 'ASC')->get();
    return view('backend.pages.teacher.create', compact('departments'));
  }


  public function store(Request $request)
  {
    $teacher = new Teacher();

    $this->validate($request, [
      'first_name' => 'required',
      'email' => 'required|unique:teachers',
      'phone_no' => 'required|unique:teachers',
      'designation' => 'required',
      'department_id' => 'required',
    ]);

    $password = str_random(8);

    $teacher->first_name = $request->first_name;
    $teacher->last_name = $request->last_name;
    $teacher->email = $request->email;
    $teacher->phone_no = $request->phone_no;
    $teacher->designation = $request->designation;
    $teacher->department_id = $request->department_id;
    $teacher->username = StringHelper::createSlug($request->first_name, 'Teacher', 'username');
    $teacher->password = Hash::make($password);
    $teacher->address = $request->address;
    $teacher->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/teachers');
    $teacher->save();

    // notify teacher of account creation by email with the instance of this teacher model
    // $teacher->notify(new AccountCreateNotification($teacher, $password));

    session()->flash('success', 'Teacher information added successfully !!!');
    return redirect()->route('admin.teacher.index');
  }


  public function edit($id)
  {
    $teacher = Teacher::orderBy('id', 'DESC')->first();
    $departments = Department::orderBy('short_name', 'ASC')->get();
    return view('backend.pages.teacher.edit', compact('teacher', 'departments'));
  }


  public function update(Request $request, $id)
  {
    $teacher = Teacher::find($id);

    $this->validate($request, [
      'first_name' => 'required',
      'email' => 'required|unique:teachers,email,'.$teacher->id,
      'phone_no' => 'required|unique:teachers,phone_no,'.$teacher->id,
      'designation' => 'required',
      'department_id' => 'required',
    ]);

    $password = str_random(8);

    $teacher->first_name = $request->first_name;
    $teacher->last_name = $request->last_name;
    $teacher->email = $request->email;
    $teacher->phone_no = $request->phone_no;
    $teacher->designation = $request->designation;
    $teacher->department_id = $request->department_id;
    $teacher->username = StringHelper::createSlug($request->first_name, 'Teacher', 'username');
    $teacher->password = Hash::make($password);
    $teacher->address = $request->address;

    // image has or not in the form
    // has image
    if(!is_null($request->image)){
      // already has image or not in the database for this teacher
      if(!is_null($teacher->image)){
        $teacher->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/teachers', $teacher->image);
      }
      // empty image for this teacher in the database
      else{
        $teacher->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/teachers');
      }
    }
    $teacher->save();

    // notify teacher of account update by email with the instance of this teacher model
    // $teacher->notify(new AccountUpdateNotification($teacher, $password));

    session()->flash('success', 'Teacher information updated successfully !!!');
    return redirect()->route('admin.teacher.index');
  }


  public function destroy($id)
  {
    $teacher = Teacher::find($id);
    // delete image for teacher
    if(!is_null($teacher->image)){
      ImageUploadHelper::delete('public/images/teachers/'.$teacher->image);
    }
    // all materials of this teacher
    $materials = TeacherMaterial::where('teacher_id', $id)->get();
    // if this teacher has material
    if(count($materials) > 0){
      foreach($materials as $material){
        // delete this single material
        UploadHelper::delete('public/files/materials/'.$material->file);
        $material->delete();
      }
    }
    $teacher->delete();
    session()->flash('error', 'Teacher information deleted successfully !!!');
    return redirect()->route('admin.teacher.index');
  }


  public function departmentTeacher($id)
  {
    $teachers = Teacher::where('department_id', $id)->get();
    return view('backend.pages.teacher.index', compact('teachers'));
  }
}
