@extends('frontend.layouts.master')

@section('content')

  <!-- Main Links -->
  <div class="main-links">
    <div class="container-fluid">
      <div class="row">
        @include('frontend.pages.teacher.sidebar')
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6"><h3 class="mb-5">Course Materials</h3></div>
            <div class="col-md-6">
              <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-fw fa-plus"></i>Add Material</button>
            </div>
          </div>
          <table class="table">
            <thead>
              <th>Title</th>
              <th>Course Code</th>
              <th>Course Title</th>
              <th>Manage</th>
            </thead>
            <tbody>
              @foreach ($materials as $material)
                <tr>
                  <td>{!! $material->title !!}</td>
                  <td>{!! $material->course->code !!}</td>
                  <td>{!! $material->course->title !!}</td>
                  <td><a href="{{ asset('public/files/materials/'.$material->file) }}" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-fw fa-download"></i>Download</a>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $material->id }}"><i class="fa fa-fw fa-edit"></i>Edit</button>
                    <!-- Add Modal -->
                    <div class="modal fade" id="editModal{{ $material->id }}" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Course Material</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <form class="form-control" action="{{ route('teacher.dashboard.material.update', $material->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="title">File Title</label>
                              <input type="text" class="form-control" name="title" id="title" value="{{ $material->title }}" aria-describedby="emailHelp" required>
                            </div>

                            <div class="form-group">
                              <label for="course_id">Course Code</label>
                              <select class="form-control" name="course_id" id="course_id" required>
                                @foreach ($courses as $course)
                                  <option value="{{ $course->id }}" {{ $material->course_id == $course->id ? 'selected' : '' }}>{!! $course->code !!}</option>
                                @endforeach
                              </select>
                            </div>

                            <div class="form-group">
                              <label for="file">File</label>
                              <input type="file" class="form-control" name="file" id="file">
                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Add Material</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $material->id }}"><i class="fa fa-fw fa-trash"></i>Delete</button>
                    <!-- Delete Modal-->
                    <div class="modal fade" id="deleteModal{{ $material->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you want to delete this image from material ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">Please confirm if you want to delete</div>
                          <div class="modal-footer">
                            <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                            <form class="" action="{{ route('teacher.dashboard.material.delete', $material->id) }}" method="post">
                              @csrf
                              <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Confirm</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Links -->

  <!-- Add Modal -->
  <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Course Material</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form class="form-control" action="{{ route('teacher.dashboard.material.add') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">File Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="File title" required>
          </div>

          <div class="form-group">
            <label for="course_id">Course Code</label>
            <select class="form-control" name="course_id" id="course_id" required>
              <option value="">Select Course</option>
              @foreach ($courses as $course)
                <option value="{{ $course->id }}">{!! $course->code !!}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="file">File</label>
            <input type="file" class="form-control" name="file" id="file" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Material</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
