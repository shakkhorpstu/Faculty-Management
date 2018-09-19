@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.about.index') }}">About</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ul>
  </div>

  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h2 class="mb-4">About LMA</h2>
            @include('backend.partials.message')
            <div class="tile-body">
              <form class="" action="{{ route('admin.about.store') }}" method="post">
                @csrf
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <label for="overview">Overview / History</label>
                    <textarea name="overview" class="form-control" id="overview" rows="8" cols="70" required>
                      @if(!empty($about))
                        {{ $about->overview }}
                      @endif
                    </textarea>
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="vision">Vision</label>
                    <textarea name="vision"  class="form-control" id="vision" rows="8" cols="70" required>
                      @if(!empty($about))
                        {{ $about->vision }}
                      @endif
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
