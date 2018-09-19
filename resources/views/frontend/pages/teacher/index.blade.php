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
        <div class="col-md-7">
          {{-- <h2>{{ "Department Of ".$dept->name }}</h2> --}}
          <div class="row">
            <div class="col-md-5">
              @if($teacher->image)
                <a href="{{ asset('public/images/teachers/'.$teacher->image) }}" target="_blank"><img src="{{ asset('public/images/teachers/'.$teacher->image) }}" alt="" class="img img-responsive img-thumbnail"></a>
              @else
                <img src="{{ asset('public/images/defaults/default.png') }}" alt="" class="img img-responsive img-thumbnail">
              @endif
            </div>
            <div class="col-md-7">
              <h3>{{ $teacher->first_name.' '.$teacher->last_name }}</h3>
              <h5>
                @if($teacher->designation == 0)
                  {{ "Professor" }}
                @elseif($teacher->designation == 1)
                  {{ "Asscociate Professor" }}
                @elseif($teacher->designation == 2)
                  {{ "Assistant Professor" }}
                @elseif($teacher->designation == 3)
                  {{ "Lecturer" }}
                @endif
              </h5>
              <h5>{{ "Department Of ".$teacher->department->name }}</h5>
              <h5>Email: <span class="pl-2">{{ $teacher->email }}</span></h5>
              <h5>Phone Number: <span class="pl-2">{{ $teacher->phone_no }}</span></h5>
            </div>
          </div>

          <h3 class="mt-5">{{ $teacher->first_name."'s" }} Course Materials</h3>
          <table class="table">
            @if(count($materials) > 0)
              @foreach($materials as $material)
                <tr>
                  <td>{{ $material->title }}</td>
                  <td>{{ $material->course->code }}</td>
                  <td>{{ $material->course->title }}</td>
                  <td>
                    <a href="{{ asset('public/files/materials/'.$material->file) }}" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-fw fa-download"></i>Download</a>
                  </td>
                </tr>
              @endforeach
            @else
              <h2 class="text-center">{{ "No material yet" }}</h2>
            @endif
          </table>
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
