@extends('frontend.layouts.master')

@section('content')

  <div class="mt-5 mb-5">
    <h3 class="text-center">Sorry!!! You are in wrong place
    <a href="{{ route('index') }}" class="btn btn-warning"><i class="fa fa-fw"></i>Go Home</a></h3>
  </div>

@endsection
