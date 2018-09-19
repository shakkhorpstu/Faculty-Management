@extends('frontend.layouts.master')

@section('content')

  <!-- Main Links -->
  <div class="main-links">
    <div class="container-fluid">
      <div class="row">
        @include('frontend.pages.teacher.sidebar')
        <div class="col-md-6">
          <h3 class="mb-5">Welcome {{ Auth::guard('teacher')->user()->first_name }}</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="card single-link" onclick="location.href='{!! route('teacher.dashboard.material') !!}'">
                <div class="card-body">
                  <h4 class="card-title">Course Material</h4>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card single-link" onclick="location.href='{!! route('teacher.dashboard.edit') !!}'">
                <div class="card-body">
                  <h4 class="card-title">Edit Profile</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Links -->



@endsection
