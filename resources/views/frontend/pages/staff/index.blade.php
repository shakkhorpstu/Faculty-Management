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
          <h2>Staff Information</h2>
          <div class="row">
            <div class="col-md-5">
              @if($staff->image)
                <a href="{{ asset('public/images/staffs/'.$staff->image) }}" target="_blank"><img src="{{ asset('public/images/staffs/'.$staff->image) }}" alt="" class="img img-responsive img-thumbnail"></a>
              @else
                <img src="{{ asset('public/images/defaults/default.png') }}" alt="" class="img img-responsive img-thumbnail">
              @endif
            </div>
            <div class="col-md-7">
              <h3>{{ $staff->name }}</h3>
              <h5>
                {{ $staff->designation }}
              </h5>
              <h5>
                @if($staff->department_id == 'dean_office')
                  {{ "Dean Office" }}
                @else
                  {{ 'Department Of '.$staff->department->name }}
                @endif
              </h5>
              <h5>Email: <span class="pl-2">{{ $staff->email }}</span></h5>
              <h5>Phone Number: <span class="pl-2">{{ $staff->phone }}</span></h5>
            </div>
          </div>
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
