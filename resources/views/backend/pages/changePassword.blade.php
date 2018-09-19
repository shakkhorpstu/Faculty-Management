@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Change Password</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Change Passowrd</span>
          </div>
        </div>

        <div class="tile-body mt-4">
          <form action="" action="{{ route('admin.changePassword.submit') }}" method="post">
            @csrf
            <div class="col-md-6 offset-md-3">
              <div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }}">
                <label for="old_password">Old Password</label>
                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old password">
                @if ($errors->has('old_password'))
                  <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('old_password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New password">
              </div>
              <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                <label for="confirm_password">New Password</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password">
                @if ($errors->has('confirm_password'))
                  <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('confirm_password') }}</strong>
                  </span>
                @endif
              </div>

              <button type="submit" class="btn btn-primary float-right">Submit</button>
              <div class="clearfix"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
