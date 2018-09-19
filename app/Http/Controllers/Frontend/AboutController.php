<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
  public function overview()
  {
    $about = About::first();
    return view('frontend.pages.about.overview', compact('about'));
  }

  public function vision()
  {
    $about = About::first();
    return view('frontend.pages.about.vision', compact('about'));
  }
}
