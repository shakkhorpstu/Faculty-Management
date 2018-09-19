<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Staff;
use App\Models\Teacher;

class DepartmentController extends Controller
{
  public function index($shortName)
  {
    $dept = Department::where('short_name', $shortName)->first();
    $teachers = Teacher::where('department_id', $dept->id)->orderBy('designation', 'ASC')->get();
    $staffs = Staff::where('department_id', $dept->id)->get();
    return view('frontend.pages.department.index', compact('dept', 'teachers', 'staffs'));
  }
}
