@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.department.index') }}">Department</a></li>
      <li class="breadcrumb-item active">Add</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Add Department</span>
          </div>
        </div>
        @include('backend.partials.message')
        <div class="tile-body mt-4">
          <form class="form-control" action="{{ route('admin.department.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="name">Department Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Department name here" required>
              </div>
              <div class="col-md-3 form-group">
                <label for="short_name">Department Short Name</label>
                <input type="text" class="form-control" name="short_name" id="short_name" placeholder="Department short name here" required>
              </div>
              <div class="col-md-3 form-group">
                <label for="image">Department Image</label>
                <input type="file" class="form-control" name="image" id="image">
              </div>
              <div class="form-group">
                <label for="description">Department Description</label>
                <textarea name="description" id="description" rows="8" cols="80" class="form-control"></textarea>
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
