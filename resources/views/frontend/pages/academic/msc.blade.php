@extends('frontend.layouts.master')

@section('content')

  <!-- Main Links -->
  <div class="main-links">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <div class="list-group">
            <a href="{{ route('academic.bsc') }}" class="list-group-item">B.Sc in LMA</a>
            <a href="{{ route('academic.msc') }}" class="list-group-item">M.Sc in LMA</a>
            <a href="{{ route('academic.activities') }}" class="list-group-item">Activities Of LMA</a>
            <a href="{{ route('academic.scholarship') }}" class="list-group-item">Scholarship</a>
          </div>
        </div>
        <div class="col-md-7">
          <h3 class="mb-3 text-center">M.Sc Of LMA</h3>
          <p style="text-align: justify;">
            @if($academic->msc)
            {{ $academic->msc }}
          @else
            {{ "Nothing to show" }}
          @endif
          </p>
        </div>
        <div class="col-md-3">
          <div class="list-group">
            <h3>Latest Notice</h3>
            @foreach(\App\Models\Notice::notices() as $notice)
              <a href="" class="list-group-item">{{ $notice->title }}</a>
            @endforeach
          </div>

          <div class="list-group mt-5">
            <h3>Latest News</h3>
            @foreach(\App\Models\Notice::newss() as $news)
              <a href="" class="list-group-item">{{ $news->title }}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Links -->



@endsection
