@extends('frontend.layouts.master')

@section('main-content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card border-primary">
          <div class="card-header bg-primary text-white">{{ __('Account verification !!') }}</div>

          <div class="card-body">
            <div class="alert alert-success">
              <p>
                A verification mail has sent to <a href="mailto:{{ $teacher->email }}">{{ $teacher->email }}</a>.
                <br />
                Please click the verification link to verify your student account for Library in that email.
              </p>

            </div>
            <div class="alert alert-success">
              <p>
                  If this is not your email ? Then Click here to change the email address and get verification mail again..
              </p>

            </div>
              <p class="text-center">
                If already verified, then <a class="btn btn-primary" href="{!! route('teacher.login') !!}">Login Now</a>
              </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
