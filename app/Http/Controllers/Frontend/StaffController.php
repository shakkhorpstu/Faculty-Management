<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;

class StaffController extends Controller
{
  public function index($userName)
  {
    $staff = Staff::where('username', $userName)->first();
    return view('frontend.pages.staff.index', compact('staff'));
  }
}
