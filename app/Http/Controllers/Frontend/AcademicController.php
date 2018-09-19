<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Academic;

class AcademicController extends Controller
{
  public function bsc()
  {
    $academic = Academic::first();
    return view('frontend.pages.academic.bsc', compact('academic'));
  }

  public function msc()
  {
    $academic = Academic::first();
    return view('frontend.pages.academic.msc', compact('academic'));
  }

  public function activities()
  {
    $academic = Academic::first();
    return view('frontend.pages.academic.activities', compact('academic'));
  }

  public function scholarship()
  {
    $academic = Academic::first();
    return view('frontend.pages.academic.scholarship', compact('academic'));
  }
}
