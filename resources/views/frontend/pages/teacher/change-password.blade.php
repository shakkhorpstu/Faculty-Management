@extends('frontend.layouts.master')

@section('content')

  <!-- Main Links -->
  <div class="main-links">
    <div class="container-fluid">
      <div class="row">
        @include('frontend.pages.teacher.sidebar')
        <div class="col-md-6">
          <h3 class="mb-5">Change Password</h3>
          <div class="card">
            <div class="card-body">
              @include('frontend.partials.message')
              <form class="" action="{{ route('teacher.changePassword') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="old_password">Old Password</label>
                  <input type="password" name="old_password" id="old_password" class="form-control" placeholder="Old password">
                </div>
                <div class="form-group">
                  <label for="new_password">New Password</label>
                  <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New password">
                </div>
                <div class="form-group">
                  <label for="confirm_password">New Password</label>
                  <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password">
                </div>

                <button type="submit" class="btn btn-primary float-right mt-2">Save Information</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Links -->



@endsection
