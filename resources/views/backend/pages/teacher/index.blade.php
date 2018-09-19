@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Teacher</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Teachers Of LMA</span>
            <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.teacher.create') }}">Add Teacher</a>
          </div>
        </div>
        @include('backend.partials.message')
        <div class="tile-body mt-4">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Image</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(!empty($teachers))
                @foreach($teachers as $teacher)
                  <tr>
                    <td>{{ $teacher->first_name.' '.$teacher->last_name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone_no }}</td>
                    <td>
                      <a href="{{ route('admin.teacher.department', $teacher->department_id) }}">{{ $teacher->department->short_name }}</a>
                    </td>
                    <td>
                      @if($teacher->designation == 0)
                        {{ "Professor" }}
                      @elseif($teacher->designation == 1)
                        {{ "Asscociate Professor" }}
                      @elseif($teacher->designation == 2)
                        {{ "Assistant Professor" }}
                      @elseif($teacher->designation == 3)
                        {{ "Lecturer" }}
                      @endif
                    </td>
                    <td><a href="{{ asset('public/images/teachers/'.$teacher->image) }}" target="_blank"><img src="{{ asset('public/images/teachers/'.$teacher->image) }}" alt="" style="width: 50px; height: 50px;"></a></td>
                    <td>
                      <a href="{{ route('admin.teacher.edit', $teacher->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $teacher->id }}"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this teacher ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.teacher.delete',$teacher->id) }}" method="post">
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

@endsection
