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
          <h3 class="mb-3">Dean Of LMA</h3>
          <div class="row mb-2">
            <div class="col-md-5">
              @if($dean->image)
                <a href="{{ asset('public/images/deans/'.$dean->image) }}" target="_blank"><img src="{{ asset('public/images/deans/'.$dean->image) }}" alt="" class="img img-responsive img-thumbnail"></a>
              @else
                <img src="{{ asset('public/images/defaults/default.png') }}" alt="" class="img img-responsive img-thumbnail">
              @endif
            </div>
            <div class="col-md-7">
              <h3>{{ $dean->first_name.' '.$dean->last_name }}</h3>
              <h5>
                @if($dean->designation == 0)
                  {{ "Professor" }}
                @elseif($teacher->designation == 1)
                  {{ "Asscociate Professor" }}
                @elseif($teacher->designation == 2)
                  {{ "Assistant Professor" }}
                @elseif($teacher->designation == 3)
                  {{ "Lecturer" }}
                @endif
              </h5>
              <h5>Email: <span class="pl-2">{{ $dean->email }}</span></h5>
              <h5>Phone Number: <span class="pl-2">{{ $dean->phone_no }}</span></h5>
            </div>
          </div>

          <h3 class="pt-5 mb-3">Dean Office Staffs</h3>
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
