@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.teacher.index') }}">Teacher</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Add Teacher</span>
          </div>
        </div>
        @include('backend.partials.message')
        <div class="tile-body mt-4">
          <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="first_name">First Name <span class="text-danger required">*</span></label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $teacher->first_name }}" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $teacher->last_name }}">
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 form-group">
                <label for="email">Email <span class="text-danger required">*</span></label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $teacher->email }}">
              </div>
              <div class="col-md-4 form-group">
                <label for="phone_no">Phone <span class="text-danger required">*</span></label>
                <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $teacher->phone_no }}">
              </div>
              <div class="col-md-4 form-group">
                <label for="department_id">Department <span class="text-danger required">*</span></label>
                <select class="form-control" id="department_id" name="department_id">
                  @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $department->id == $teacher->department_id ? 'selected' : '' }}>{{ $department->short_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4 form-group">
                <label for="designation">Designation <span class="text-danger required">*</span></label>
                <select class="form-control" name="designation">
                  <option value="0" {{ $teacher->designation == 0 ? 'selected' : '' }}>Professor</option>
                  <option value="1" {{ $teacher->designation == 1 ? 'selected' : '' }}>Associate Professor</option>
                  <option value="2" {{ $teacher->designation == 2 ? 'selected' : '' }}>Assistant Professor</option>
                  <option value="3" {{ $teacher->designation == 3 ? 'selected' : '' }}>Lecturer</option>
                </select>
              </div>
              <div class="col-md-4 form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{ $teacher->address }}" class="form-control">
              </div>
              <div class="col-md-4 form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
              </div>
            </div>

            <button type="submit" class="btn btn-success float-right">Save Information</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
