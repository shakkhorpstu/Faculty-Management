@extends('frontend.layouts.master')

@section('stylesheets')
  <link href="{!! asset('css/select2/select2.min.css') !!}" rel="stylesheet" />
  <link href="{!! asset('js/parsley/parsley.css') !!}" rel="stylesheet" />
@endsection

@section('main-content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card border-primary">
          <div class="card-header bg-primary text-white">{{ __('Sign Up Teacher') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('teacher.register_post') }}"  data-parsley-validate>
              @csrf

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" name="first_name"  value="{{ old('first_name') }}" placeholder="Enter your first name" required autofocus>
                  @if ($errors->has('first_name'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group col-md-6">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" name="last_name"  value="{{ old('last_name') }}" placeholder="Enter your last name" required autofocus>
                  @if ($errors->has('last_name'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="faculty">Faculty</label>
                  <select class="form-control{{ $errors->has('faculty') ? ' is-invalid' : '' }}" name="faculty" id="faculty" value="{{ old('faculty') }}" required>
                    @foreach ($faculties as $faculty)
                      <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('faculty'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('faculty') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group col-md-6">
                  <label for="department">Department</label>
                  <select class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" name="department" id="department" value="{{ old('department') }}" required>
                    @foreach ($departments as $department)
                      <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('department'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('department') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="email">Email Address</label>
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required placeholder="Enter your email address">

                  @if ($errors->has('email'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group col-md-6">
                  <label for="phone_no">Phone No</label>
                  <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" required placeholder="Enter your phone number">

                  @if ($errors->has('phone_no'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('phone_no') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="address">Permanent Address</label>
                  <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required placeholder="Enter your address address">

                  @if ($errors->has('address'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('address') }}</strong>
                    </span>
                  @endif
                </div>

                <div class="form-group col-md-6">
                  <label for="designation">Designation</label>
                  <select class="form-control" name="designation" placeholder="Please Select your designation">
                      <option>Please select your Designation</option>
                      <option value="Lecturer">Lecturer</option>
                      <option value="Assistant Professor">Assistant Professor</option>
                      <option value="Associate Professor">Associate Professor</option>
                      <option value="Professor">Professor</option>
                  </select>

                  @if ($errors->has('address'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('address') }}</strong>
                    </span>
                  @endif
                </div>

              </div>
              <div class="form-row">

              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="level">Preferred books category</label>
                  <select class="form-control select2" name="favorite_subjects[]" multiple="multiple" placeholder="Please Select a subject which book do you want to read">
                    @foreach ($subjects as $subject)
                      <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                  </select>
                </div>

              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="password">Password</label>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))
                    <span class="invalid-feedback">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group col-md-6">
                  <label for="password-confirm">Confirm Password</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                </div>
              </div>


              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-lg btn-primary">
                    {{ __('Complete Registration') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{!! asset('js/parsley/parsley.min.js') !!}"></script>
  <script src="{!! asset('js/select2/select2.min.js') !!}"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
  });
  </script>
@endsection
