<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Notice;

class Notice extends Model
{
  public static function notices()
  {
    $notices = Notice::where('status', 1)->where('notice_news_event', 0)->orderBy('id', 'DESC')->get();
    return $notices;
  }

  public static function newss()
  {
    $newss = Notice::where('status', 1)->where('notice_news_event', 1)->orderBy('id', 'DESC')->get();
    return $newss;
  }
}
