@extends('frontend.layouts.master')

@section('content')

  <!-- Main Links -->
  <div class="main-links">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <div class="list-group">
            @foreach(\App\Models\Department::departments() as $department)
              <a href="{{ route('department.index', $department->short_name) }}" class="list-group-item">{{ $department->short_name }}</a>
            @endforeach
          </div>
        </div>
        <div class="col-md-8">
          <div class="row">
            @foreach($galleries as $gallery)
              <div class="col-md-4">
                <div class="card single-link" onclick="location.href='{!! route('index') !!}'">
                  <img class="card-img-top" src="{!! asset('public/images/galleries/'.$gallery->image) !!}">
                  <div class="card-body">
                    <h4 class="card-title">{{ $gallery->title }}</h4>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="col-md-2">
          <div class="list-group">
            <h3>Latest Notice</h3>
            @foreach(\App\Models\Notice::notices() as $notice)
              <a href="" class="list-group-item">{{ $notice->title }}</a>
            @endforeach
          </div>

          <div class="list-group mt-5">
            <h3>Latest News</h3>
            @foreach(\App\Models\Notice::newss() as $news)
              <a href="" class="list-group-item">{{ $news->title }}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Links -->



@endsection
