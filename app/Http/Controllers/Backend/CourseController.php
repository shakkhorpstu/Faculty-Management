<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UploadHelper;
use App\Models\Course;
use App\Models\Department;
use App\Models\TeacherMaterial;
use Session;

class CourseController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  /**
   * [return all courses data to course indecx page]
   * @return [type] [description]
   */
  public function index()
  {
    $courses = Course::orderBy('id', 'DESC')->get();
    $departments = Department::orderBy('name', 'ASC')->get();
    return view('backend.pages.course.index', compact('courses', 'departments'));
  }



  /**
   * [store all course data => course code & title unique]
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function store(Request $request)
  {
    $course = new Course();

    $this->validate($request, [
      'code' => 'required|unique:courses',
      'title' => 'required|unique:courses',
      'department_id' => 'required|numeric',
    ]);

    $course->code = $request->code;
    $course->title = $request->title;
    $course->department_id = $request->department_id;
    $course->save();

    session()->flash('success', 'Course information added successfully !!!');
    return redirect()->route('admin.course.index');
  }



  /**
   * [update all course data => course code & title unique]
   * @param  Request $request [description]
   * @param  [type]  $id      [description]
   * @return [type]           [description]
   */
  public function update(Request $request, $id)
  {
    $course = Course::find($id);

    $this->validate($request, [
      'code' => 'required|unique:courses,code,'.$course->id,
      'title' => 'required|unique:courses,title,'.$course->id,
      'department_id' => 'required|numeric',
    ]);

    $course->code = $request->code;
    $course->title = $request->title;
    $course->department_id = $request->department_id;
    $course->save();

    session()->flash('success', 'Course information updated successfully !!!');
    return redirect()->route('admin.course.index');
  }


  /**
   * [delete course & also materials associated with this course]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function destroy($id)
  {
    $course = Course::find($id);
    $materials = TeacherMaterial::where('course_id', $course->id)->get();
    if(count($materials) > 0){
      foreach($materials as $material){
        UploadHelper::delete('public/files/materials/'.$material->file);
        $material->delete();
      }
    }

    $course->delete();
    session()->flash('success', 'Course information deleted successfully !!!');
    return redirect()->route('admin.course.index');
  }


  /**
   * [return all course that related to same department]
   * @param  [type] $shortName [department=>short_name]
   * @return [type]            [description]
   */
  public function departmentCourse($shortName)
  {
    $department = Department::where('short_name', $shortName)->first();
    $courses = Course::where('department_id', $department->id)->get();
    $departments = Department::orderBy('name', 'ASC')->get();
    return view('backend.pages.course.index', compact('courses', 'departments'));
  }
}
