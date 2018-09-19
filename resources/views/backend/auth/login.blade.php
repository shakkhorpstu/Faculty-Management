@extends('backend.auth.master')

@section('content')

  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1 id="title">LMA Admin Dashboard Login</h1>

      @if ( Session::has('login_error') )
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {!! Session::get('login_error') !!}
        </div>
      @endif

    </div>
    <div class="login-box">
      <form class="login-form" method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>

        <div class="form-group">
          <label class="control-label" for="email">Email</label>
          <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="form-group">
          <label class="control-label" for="password">PASSWORD</label>
          <input class="form-control" type="password" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group">
          <div class="utility">
            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
          </div>
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
        </div>
      </form>

      <form class="forget-form" action="index.html">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
        <div class="form-group">
          <label class="control-label" for="email">EMAIL</label>
          <input class="form-control" type="email" name="email" id="email" placeholder="Email" autofocus>
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>SEND RESET LINK</button>
        </div>
        <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
        </div>
      </form>
      </form>
    </div>
  </section>

@endsection
