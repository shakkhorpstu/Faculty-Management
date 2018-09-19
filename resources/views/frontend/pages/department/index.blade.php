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
          <h2>{{ "Department Of ".$dept->name }}</h2>
          <div class="row">
            <div class="col-md-6">
              @if($dept->image)
                <a href="{{ asset('public/images/departments/'.$dept->image) }}" target="_blank"><img src="{{ asset('public/images/departments/'.$dept->image) }}" alt="" class="img img-responsive img-thumbnail"></a>
              @endif
            </div>
            <div class="col-md-6">
              {{ $dept->description }}
            </div>
          </div>
          <h3 class="pt-5 mb-5">Total {{ count($teachers) }} Teahcers</h3>
          <div class="row">
            @foreach($teachers as $teacher)
              <div class="col-md-4">
                <div class="card single-link" onclick="location.href='{!! route('teacher.index', $teacher->username) !!}'">
                  @if($teacher->image != null)
                    <img class="card-img-top" src="{!! asset('public/images/teachers/'.$teacher->image) !!}">
                  @else
                    <img class="card-img-top" src="{!! asset('public/images/defaults/default.png') !!}">
                  @endif
                  <div class="card-body">
                    <h4 class="card-title">{{ $teacher->first_name.' '.$teacher->last_name }}</h4>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <h3 class="pt-5 mb-5">Total {{ count($staffs) }} Staffs</h3>
          <div class="row">
            @foreach($staffs as $staff)
              <div class="col-md-4">
                <div class="card single-link" onclick="location.href='{!! route('staff.index', $staff->username) !!}'">
                  @if($staff->image != null)
                    <img class="card-img-top" src="{!! asset('public/images/staffs/'.$staff->image) !!}">
                  @else
                    <img class="card-img-top" src="{!! asset('public/images/defaults/default.png') !!}">
                  @endif
                  <div class="card-body">
                    <h4 class="card-title">{{ $staff->name }}</h4>
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
