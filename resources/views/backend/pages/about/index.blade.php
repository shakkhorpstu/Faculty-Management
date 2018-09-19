@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">About</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">About LMA</span>
            <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.about.edit') }}">Edit About Page</a>
          </div>
        </div>
        @include('backend.partials.message')
        <div class="tile-body">
          <div class="row mt-5">
            <div class="col-md-6">
              <div class="form-group">
                <h3 for="">Overview Description</h3> <br>
                {{ $about->overview }}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <h3 for="">Vision Description</h3> <br>
                {{ $about->vision }}
              </div>
            </div>
          </div>
          {{-- <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
          <tr>
          <th>Name</th>
          <th>Position</th>
          <th>Office</th>
          <th>Age</th>
          <th>Start date</th>
          <th>Salary</th>
        </tr>
      </thead>
      <tbody>
      <tr>
      <td>Tiger Nixon</td>
      <td>System Architect</td>
      <td>Edinburgh</td>
      <td>61</td>
      <td>2011/04/25</td>
      <td>$320,800</td>
    </tr>
  </tbody>
</table> --}}
</div>
</div>
</div>
</div>

@endsection
