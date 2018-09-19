@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Course</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Courses Of LMA</span>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal">Add Course</button>
          </div>
        </div>
        @include('backend.partials.message')
        <div class="tile-body mt-4">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Department</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(!empty($courses))
                @foreach($courses as $course)
                  <tr>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->title }}</td>
                    <td><a href="{{ route('admin.course.department', $course->department->short_name) }}">{{ $course->department->short_name }}</a></td>
                    <td>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#courseEditModal{{ $course->id }}"><i class="fa fa-fw fa-edit"></i>Edit</button>
                      <div class="modal fade" id="courseEditModal{{ $course->id }}" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Edit Course</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form class="form-control" action="{{ route('admin.course.update', $course->id) }}" method="post">
                              @csrf
                              <div class="form-group">
                                <label for="code">Course Code</label>
                                <input type="text" class="form-control" name="code" id="code" aria-describedby="emailHelp" value="{{ $course->code }}" required>
                              </div>

                              <div class="form-group">
                                <label for="title">Course Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $course->title }}" required>
                              </div>

                              <div class="form-group">
                                <label for="department_id">Department</label>
                                <select class="form-control department" name="department_id" id="department_id">
                                  @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ ($department->id == $course->department_id) ? 'selected' : '' }}>{{ $department->short_name }}</option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Course</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $course->id }}"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this course ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.course.delete',$course->id) }}" method="post">
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
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- Add Modal --}}
  <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form class="form-control" action="{{ route('admin.course.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="code">Course Code</label>
            <input type="text" class="form-control" name="code" id="code" aria-describedby="emailHelp" placeholder="Course code here" required>
          </div>

          <div class="form-group">
            <label for="title">Course Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Course title here" required>
          </div>

          <div class="form-group">
            <label for="department_id">Department</label>
            <select class="form-control department" name="department_id" id="department_id" required>
              <option value="">Select Department</option>
              @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->short_name }}</option>
              @endforeach
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Course</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
