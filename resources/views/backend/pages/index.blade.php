@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ul>
  </div>

  @include('backend.partials.message')

  <div class="row">
    <div class="col-md-4 mt-5">
      <div class="card single-link">
        <div class="card-body">
          <h4 class="card-title">{{ \App\Models\TeacherMaterial::count() }} Course Files</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 mt-5">
      <div class="card single-link" onclick="location.href='{!! route('admin.department.index') !!}'">
        <div class="card-body">
          <h4 class="card-title">{{ \App\Models\Department::count() }} Departments</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 mt-5">
      <div class="card single-link" onclick="location.href='{!! route('admin.course.index') !!}'">
        <div class="card-body">
          <h4 class="card-title">{{ \App\Models\Course::count() }} Courses</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 mt-5">
      <div class="card single-link" onclick="location.href='{!! route('admin.teacher.index') !!}'">
        <div class="card-body">
          <h4 class="card-title">{{ \App\Models\Teacher::count() }} Teachers</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 mt-5">
      <div class="card single-link" onclick="location.href='{!! route('admin.staff.index') !!}'">
        <div class="card-body">
          <h4 class="card-title">{{ \App\Models\Staff::count() }} Staffs</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 mt-5">
      <div class="card single-link" onclick="location.href='{!! route('admin.deanMeritList.index') !!}'">
        <div class="card-body">
          <h4 class="card-title">{{ \App\Models\DeanMeritList::count() }} Student in Dean Merit List</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 mt-5">
      <div class="card single-link" onclick="location.href='{!! route('admin.download.index') !!}'">
        <div class="card-body">
          <h4 class="card-title">{{ \App\Models\Download::count() }} Download Files</h4>
        </div>
      </div>
    </div>
  </div>
@endsection
