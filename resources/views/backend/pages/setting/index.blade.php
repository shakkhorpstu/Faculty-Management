@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Setting</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Settings Of LMA</span>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal">Edit Settings</button>
          </div>
        </div>
        @include('backend.partials.message')
        <div class="tile-body">
          @if(!empty($setting))
            <div class="mt-5">
                <h3>Website Title</h3>
                <h4 class="mt-4">{{ $setting->title }}</h4>
            </div>
            <div class="row mt-5">
              <div class="col-md-6">
                <div class="form-group">
                  <h3 for="">Logo</h3> <br>
                  <a href="{{ asset('public/images/settings/'.$setting->logo) }}" target="_blank">
                    <img src="{{ asset('public/images/settings/'.$setting->logo) }}" alt="" class="img-responsive img-thumbnail">
                  </a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h3 for="">Favicon</h3> <br>
                  <a href="{{ asset('public/images/settings/'.$setting->favicon) }}" target="_blank">
                    <img src="{{ asset('public/images/settings/'.$setting->favicon) }}" alt="" class="img-responsive img-thumbnail">
                  </a>
                </div>
              </div>
            </div>
          @else
            <div class="row mt-5">
              <h2 class="text-danger">Nothing to show</h2>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>


  <!-- Add Modal -->
  <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Esit Settings</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form class="form-control" action="{{ route('admin.setting.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">Website Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" @if(is_null($setting)) placeholder="Website title" @else value="{{ $setting->title }}" @endif required>
          </div>

          <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="form-control" name="logo" id="logo">
          </div>

          <div class="form-group">
            <label for="favicon">Favicon</label>
            <input type="file" class="form-control" name="favicon" id="favicon">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Settings Information</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
