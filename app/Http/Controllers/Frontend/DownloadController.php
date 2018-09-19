<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Download;

class DownloadController extends Controller
{
  public function form()
  {
    $downloads = Download::where('type', 0)->get();
    return view('frontend.pages.download.result_form', compact('downloads'));
  }

  public function result()
  {
    $downloads = Download::where('type', 1)->get();
    return view('frontend.pages.download.result_form', compact('downloads'));
  }
}
