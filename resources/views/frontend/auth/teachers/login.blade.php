@extends('frontend.layouts.master')

@section('styles')
  <link rel="stylesheet" href="{{ asset('public/css/login_registration.css') }}">
@endsection

@section('content')
  <div class="col-md-6 offset-md-3">
    <form class="form-signin pt-5" method="POST" action="{{ route('teacher.login.submit') }}">
      @csrf
      <h2 class="form-signin-heading">Teacher Account Login</h2>

      @if ( Session::has('login_error') )
            <div class="alert alert-danger">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {!! Session::get('login_error') !!}
            </div>
      @endif

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address"  name="email" value="{{ old('email') }}" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
        </label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Login Now</button> <br />
      <a class="btn text-danger btn-link float-right" href="{{ route('teacher.password.request') }}">
        Forgot Your Password?
      </a>
      <div class="clearfix"></div>
    </form>
  </div>

@endsection
