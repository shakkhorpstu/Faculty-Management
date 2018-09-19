@extends('frontend.layouts.master')

@section('main-content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card border-primary">
          <div class="card-header bg-primary text-white">{{ __('Account verification !!') }}</div>

          <div class="card-body">
            <div class="alert alert-success">
              <p>Tour account successfully verified !!!
            </div>
              <p class="text-center">
                <a href="{!! route('teacher.login') !!}" class="btn btn-primary">Please Login Now</a>
              </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
