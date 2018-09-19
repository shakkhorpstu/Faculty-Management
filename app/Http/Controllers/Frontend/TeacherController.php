<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Helpers\UploadHelper;
use App\Helpers\StringHelper;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Department;
use App\Models\TeacherMaterial;
use Session;
use Auth;

class TeacherController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:teacher', ["except" => 'show']);
  }

  public function show($userName)
  {
    $teacher = Teacher::where('username', $userName)->first();
    $materials = TeacherMaterial::where('teacher_id', $teacher->id)->orderBy('id', 'DESC')->get();
    return view('frontend.pages.teacher.index', compact('teacher', 'materials'));
  }

  public function index()
  {
    return view('frontend.pages.teacher.dashboard');
  }

  public function editProfileForm()
  {
    $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
    $departments = Department::orderBy('short_name', 'ASC')->get();
    return view('frontend.pages.teacher.edit_profile', compact('teacher', 'departments'));
  }

  public function editProfile(Request $request)
  {
    $teacher = Teacher::find(Auth::guard('teacher')->user()->id);

    $this->validate($request, [
      'first_name' => 'required',
      'email' => 'required|unique:teachers,email,'.$teacher->id,
      'phone_no' => 'required|unique:teachers,phone_no,'.$teacher->id,
      'department_id' => 'required',
      'designation' => 'required',
    ]);

    $teacher->first_name = $request->first_name;
    $teacher->last_name = $request->last_name;
    $teacher->email = $request->email;
    $teacher->phone_no = $request->phone_no;
    $teacher->designation = $request->designation;
    $teacher->department_id = $request->department_id;
    $teacher->username = StringHelper::createSlug($request->first_name, 'Teacher', 'username');
    $teacher->address = $request->address;
    if(!is_null($request->image)){
      if(!is_null($teacher->image)){
        $teacher->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/teachers', $teacher->image);
      }
      else{
        $teacher->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/teachers');
      }
    }
    $teacher->save();

    session()->flash('success', 'Teacher profile updated successfully !!!');
    return redirect()->route('teacher.dashboard');
  }

  public function changePasswordForm()
  {
    return view('frontend.pages.teacher.change-password');
  }


  public function changePassword(Request $request)
  {
    $this->validate($request,[
      'old_password' => 'required',
      'new_password' => 'required',
      'confirm_password' => 'required',
    ]);

    $check = Hash::check($request->old_password, Auth::guard('teacher')->User()->password);
    if($check){
      if($request->new_password != $request->confirm_password){
        session()->flash('confirm_password', 'New password & confirm password does not match !!!');
        return redirect()->route('teacher.changePasswordForm');
      }
      else{
        $teacher = Teacher::find(Auth::guard('teacher')->user()->id);
        $teacher->password = Hash::make($request->new_password);
        $teacher->save();
        session()->flash('success', 'Password updated successfully !!!');
        return redirect()->route('teacher.dashboard');
      }
    }
    else{
      session()->flash('old_password', 'Old password does not match !!!');
      return redirect()->route('teacher.dashboard.changePasswordForm');
    }
  }

  public function materials()
  {
    $materials = TeacherMaterial::orderBy('id', 'DESC')->get();
    $courses = Course::orderBy('code', 'ASC')->get();
    return view('frontend.pages.teacher.material', compact('materials', 'courses'));
  }

  public function addMaterial(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'course_id' => 'required',
      'file' => 'required',
    ]);

    $material = new TeacherMaterial();
    $material->teacher_id = Auth::guard('teacher')->user()->id;
    $material->title = $request->title;
    $material->course_id = $request->course_id;
    $material->file = UploadHelper::upload('file', $request->file('file'), time(), 'public/files/materials');
    $material->save();

    session()->flash('success', 'Course Material uploaded successfully !!!');
    return redirect()->route('teacher.dashboard.material');
  }

  public function editMaterial(Request $request, $id)
  {
    $this->validate($request, [
      'title' => 'required',
      'course_id' => 'required',
      'file' => 'required',
    ]);

    $material = TeacherMaterial::find($id);
    $material->teacher_id = Auth::guard('teacher')->user()->id;
    $material->title = $request->title;
    $material->course_id = $request->course_id;
    $material->file = UploadHelper::update('file', $request->file('file'), time(), 'public/files/materials', $material->file);
    $material->save();

    session()->flash('success', 'Course Material updated successfully !!!');
    return redirect()->route('teacher.dashboard.material');
  }

  public function deleteMaterial(Request $request, $id)
  {
    $material = TeacherMaterial::find($id);
    if($materials->file){
      UploadHelper::delete('public/files/materials/'.$material->file);
    }
    $material->delete();
    session()->flash('success', 'Course Material deleted successfully !!!');
    return redirect()->route('teacher.dashboard.material');
  }
}
