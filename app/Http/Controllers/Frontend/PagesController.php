<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\Gallery;
use App\Models\Dean;
use App\Models\Staff;

class PagesController extends Controller
{
    public function index()
    {
      $dean = Dean::where('status', 1)->first();
      $notices = Notice::where('status', 1)->where('notice_news_event', 0)->get();
      $newss = Notice::where('status', 1)->where('notice_news_event', 1)->get();

      return view('frontend.pages.index', compact('dean', 'notices', 'newss'));
    }


    public function administration()
    {
      $dean = Dean::where('status', 1)->first();
      $staffs = Staff::where('department_id', 'dean_office')->get();
      return view('frontend.pages.administration.index', compact('staffs', 'dean'));
    }


    public function gallery()
    {
      $galleries = Gallery::orderBy('id', 'DESC')->get();
      return view('frontend.pages.gallery.index', compact('galleries'));
    }
}
