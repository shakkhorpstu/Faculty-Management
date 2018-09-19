@extends('frontend.layouts.master')

@section('content')

  <div class="notices-page mt-2">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class=" news-single">
            <h2>All Notices</h2>
            <ul>
              <div class="card">
                @foreach($notices as $notice)
                  <div class="card-body">
                    <a href="{{ route('notice.single', $notice->slug) }}">{{ $notice->title }}</a>
                  </div>
                @endforeach
              </div>
            </ul>
            <a href="{{ route('allNotice') }}" class="btn btn-outline-warning float-right">Read More Notices</a>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="news-single">
            <h2>All Events</h2>
            <ul>
              <div class="card">
                @foreach($events as $event)
                  <div class="card-body">
                    <a href="{{ route('event.single', $event->slug) }}">{{ $event->title }}</a>
                  </div>
                @endforeach
              </div>
            </ul>
            <a href="{{ route('allEvent') }}" class="btn btn-outline-warning float-right">Read More Events</a>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="news-single">
          <h2>All News</h2>
          <ul>
            <div class="card">
              @foreach($newss as $news)
                <div class="card-body">
                  <a href="{{ route('news.single', $news->slug) }}">{{ $news->title }}</a>
                </div>
              @endforeach
            </div>
          </ul>
          <a href="{{ route('allNews') }}" class="btn btn-outline-warning float-right">Read More News</a>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>

@endsection
