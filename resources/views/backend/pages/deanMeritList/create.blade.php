@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.deanMeritList.index') }}">Dean Merit List</a></li>
      <li class="breadcrumb-item active">Add</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Add Student To Merit List</span>
          </div>
        </div>
        @include('backend.partials.message')
        <div class="tile-body mt-4">
          <form action="{{ route('admin.deanMeritList.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="first_name">First Name <span class="text-danger required">*</span></label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" required>
              </div>
              <div class="col-md-6 form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email address">
              </div>
              <div class="col-md-6 form-group">
                <label for="phone_no">Phone</label>
                <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone number">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="cgpa">CGPA <span class="text-danger required">*</span></label>
                <input type="text" class="form-control" name="cgpa" id="cgpa" placeholder="CGPA">
              </div>
              <div class="col-md-6 form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
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
