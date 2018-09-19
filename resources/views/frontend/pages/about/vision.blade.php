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
        <div class="col-md-7">
          <h3 class="mb-3 text-center">Vision Of LMA</h3>
          <p style="text-align: justify;">
            {{ $about->vision }}
          </p>
        </div>
        <div class="col-md-3">
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
