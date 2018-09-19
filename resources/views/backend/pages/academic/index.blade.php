@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Academic</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">About LMA Acamdemic Page</span>
            <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.academic.edit') }}">Edit Academic Page</a>
          </div>
        </div>
        @include('backend.partials.message')
        @if(!empty($academic))
          <div class="tile-body">
            <div class="row mt-5">
              <div class="col-md-6">
                <div class="form-group">
                  <h3 for="">Description Of B.Sc</h3> <br>
                  {{ $academic->bsc }}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h3 for="">Description Of M.Sc</h3> <br>
                  {{ $academic->msc }}
                </div>
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-6">
                <div class="form-group">
                  <h3 for="">Activities</h3> <br>
                  {{ $academic->activities }}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h3 for="">Scholarship</h3> <br>
                  {{ $academic->scholarship }}
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>

@endsection
