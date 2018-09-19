@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dean.index') }}">Dean</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ul>
  </div>

  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h2 class="mb-4">Dean Of LMA</h2>

            <div class="tile-body">
              <form class="" action="{{ route('admin.dean.edit', $dean->id) }}" method="post" enctype="multipart/form-data">
                @include('backend.partials.message')
                @csrf
                <div class="form-row">
                  <div class="col-md-3 form-group">
                    <label for="first_name">First Name <span class="text-danger required">*</span></label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $dean->first_name }}">
                  </div>
                  <div class="col-md-3 form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $dean->last_name }}" placeholder="Last name">
                  </div>
                  <div class="col-md-3 form-group">
                    <label for="image">Image <span class="text-danger required">*</span> <a href="{{ asset('public/images/deans/'.$dean->image) }}" target="_blank" class="ml-2">(Existing Image)</a></label>
                    <input type="file" name="image" id="image" class="form-control">
                  </div>
                  <div class="col-md-3 form-group">
                    <label for="status">Status</label>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ ($dean->status == 1) ? 'checked' : '' }}>Present Dean
                        </label>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-4 form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $dean->email }}" placeholder="Email address">
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="phone_no">Phone Number</label>
                    <input type="text" class="form-control" name="phone_no" id="phone_no" value="{{ $dean->phone_no }}" placeholder="Phone number">
                  </div>
                  <div class="col-md-4 form-group">
                    <label for="designation">Designation <span class="text-danger required">*</span></label>
                    <select class="form-control" name="designation" id="designation">
                      <option value="0" {{ ($dean->designation == 0) ? 'selected' : '' }}>Professor</option>
                      <option value="1" {{ ($dean->designation == 1) ? 'selected' : '' }}>Associate Professor</option>
                      <option value="2" {{ ($dean->designation == 2) ? 'selected' : '' }}>Assistant Professor</option>
                      <option value="3" {{ ($dean->designation == 3) ? 'selected' : '' }}>Lecturer</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="message">Message From Dean <span class="text-danger required">*</span></label>
                  <textarea name="message" id="message" class="form-control" rows="8" cols="70">
                    {{ $dean->message }}
                  </textarea>
                </div>

                <button type="submit" class="btn btn-success float-right">Save Information</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection
