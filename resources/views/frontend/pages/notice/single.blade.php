@extends('frontend.layouts.master')

@section('content')

  <div class="notices-page mt-2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 mt-5 mb-5">
          <h3 class="mb-2">{{ $notice->title }}</h3>
          <div class="row mb-3">
            <div class="col-md-6 mt-2">
              <h5>{{ $notice->created_at->toFormattedDateString() }}</h5>
            </div>
            <div class="col-md-6 mt-2">
              @if(($notice->file != null)) <a href="{{ asset('public/files/notices/'.$notice->file) }}" class="btn btn-warning btn-sm float-right" target="_blank">See File</a> @endif
            </div>
          </div>
          <p style="text-align: justify;">
            {{ $notice->description }}
          </p>
        </div>
      </div>
    </div>
  </div>

@endsection
