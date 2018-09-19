@extends('frontend.layouts.master')

@section('content')

  <!-- Main Links -->
  <div class="main-links">
    <div class="container-fluid">
      <div class="row">
        @include('frontend.pages.teacher.sidebar')
        <div class="col-md-6">
          <h3 class="mb-5">Edit Profile</h3>
          <div class="card">
            <div class="card-body">
              <form class="" action="{{ route('teacher.dashboard.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="first_name">First Name <span class="text-danger required">*</span></label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $teacher->first_name }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="last_name">Last Name </label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $teacher->last_name }}" placeholder="Last name" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="email">Email <span class="text-danger required">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $teacher->email }}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="phone_no">Phone <span class="text-danger required">*</span></label>
                    <input type="text" name="phone_no" class="form-control" id="phone_no" value="{{ $teacher->phone_no }}" placeholder="Last name" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-md-6">
                    <label for="department_id">Department <span class="text-danger required">*</span></label>
                    <select class="form-control" id="department_id" name="department_id">
                      @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $teacher->department_id ? 'selected' : '' }}>{{ $department->short_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="designation">Designation <span class="text-danger required">*</span></label>
                    <select class="form-control" name="designation">
                      <option value="0" {{ $teacher->designation == 0 ? 'selected' : '' }}>Professor</option>
                      <option value="1" {{ $teacher->designation == 1 ? 'selected' : '' }}>Associate Professor</option>
                      <option value="2" {{ $teacher->designation == 2 ? 'selected' : '' }}>Assistant Professor</option>
                      <option value="3" {{ $teacher->designation == 3 ? 'selected' : '' }}>Lecturer</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <label for="">Image</label>
                  <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary float-right mt-2">Save Information</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Links -->



@endsection
