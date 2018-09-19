@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.department.index') }}">Department</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Edit Department</span>
          </div>
        </div>

        <div class="tile-body mt-4">
          @include('backend.partials.message')
          <form class="form-control" action="{{ route('admin.department.update', $department->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-5 form-group">
                <label for="name">Department Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $department->name }}" required>
              </div>
              <div class="col-md-3 form-group">
                <label for="short_name">Department Short Name</label>
                <input type="text" class="form-control" name="short_name" id="short_name" value="{{ $department->short_name }}" required>
              </div>
              <div class="col-md-4 form-group">
                <label for="image">Department Image @if(!is_null($department->image)) <a href="{{ asset('public/images/departments/'.$department->image) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-download"></i>Existing Image</a> @endif</label>
                <input type="file" class="form-control" name="image" id="image">
              </div>
              <div class="form-group">
                <label for="description">Department Description</label>
                <textarea name="description" id="description" rows="8" cols="80" class="form-control">
                  {{ $department->description }}
                </textarea>
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
