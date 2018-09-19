@extends('frontend.layouts.master')

@section('content')

  <div class="notices-page mt-2">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="news-single">
            <h2>
              @if($noticeType == "notice")
                {{ "All Notices" }}
              @elseif($noticeType == "news")
                {{ "All News" }}
              @else
                {{ "All Events" }}
              @endif
            </h2>
            <ul>
              <div class="card">
                @foreach($notices as $notice)
                  <div class="card-body">
                    <a href="{{ route('notice.single', $notice->slug) }}">{{ $notice->title }}</a>
                  </div>
                @endforeach
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
