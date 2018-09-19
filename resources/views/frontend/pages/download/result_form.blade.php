@extends('frontend.layouts.master')

@section('content')

  <!-- Main Links -->
  <div class="main-links">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <div class="list-group">
            @foreach(\App\Models\Department::departments() as $department)
              <a href="{{ route('department.index', $department->short_name) }}" class="list-group-item">{{ $department->short_name }}</a>
            @endforeach
          </div>
        </div>
        <div class="col-md-6 offset-md-1">
          <h3 class="text-center mb-5">Download Section Of LMA</h3>
          <div class="row">
            <table class="table">
              <tbody>
                @foreach($downloads as $download)
                  <tr>
                    <td>{{ $download->title }}</td>
                    <td>{{ $download->created_at->toFormattedDateString() }}</td>
                    <td><a href="{{ asset('public/files/downloads/'.$download->file) }}" target="_blank" class="btn btn-warning"><i class="fa fa-fw fa-download"></i>Download</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-2 offset-md-1">
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
