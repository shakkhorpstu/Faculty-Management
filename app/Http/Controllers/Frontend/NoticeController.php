<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notice;

class NoticeController extends Controller
{
  public function index()
  {
    $notices = Notice::where('status', 1)->where('notice_news_event', 0)->orderBy('id', 'DESC')->paginate(10);
    $newss = Notice::where('status', 1)->where('notice_news_event', 1)->orderBy('id', 'DESC')->paginate(10);
    $events = Notice::where('status', 1)->where('notice_news_event', 2)->orderBy('id', 'DESC')->paginate(10);
    return view('frontend.pages.notice.index', compact('notices', 'newss', 'events'));
  }

  public function single($slug)
  {
    $notice = Notice::where('status', 1)->where('notice_news_event', 0)->first();
    return view('frontend.pages.notice.single', compact('notice'));
  }

  public function singleEvent($slug)
  {
    $notice = Notice::where('status', 1)->where('notice_news_event', 2)->first();
    return view('frontend.pages.notice.single', compact('notice'));
  }

  public function singleNews($slug)
  {
    $notice = Notice::where('status', 1)->where('notice_news_event', 1)->first();
    return view('frontend.pages.notice.single', compact('notice'));
  }

  public function notice()
  {
    $notices = Notice::where('status', 1)->where('notice_news_event', 0)->orderBy('id', 'DESC')->get();
    $noticeType = "notice";
    return view('frontend.pages.notice.individualType', compact('notices', 'noticeType'));
  }

  public function news()
  {
    $notices = Notice::where('status', 1)->where('notice_news_event', 1)->orderBy('id', 'DESC')->get();
    $noticeType = "news";
    return view('frontend.pages.notice.individualType', compact('notices', 'noticeType'));
  }

  public function event()
  {
    $notices = Notice::where('status', 1)->where('notice_news_event', 2)->orderBy('id', 'DESC')->get();
    $noticeType = "event";
    return view('frontend.pages.notice.individualType', compact('notices', 'noticeType'));
  }
}
