@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Staff</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Staffs Of LMA</span>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal">Add Staff</button>
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
              @if(!empty($staffs))
                @foreach($staffs as $staff)
                  <tr>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>
                      @if($staff->department_id == "dean_office")
                      <a href="{{ route('admin.staff.department', $staff->department_id) }}">{{ "Dean Office" }}</a>
                    @else
                      <a href="{{ route('admin.staff.department', $staff->department_id) }}">{{ $staff->department->short_name }}</a>
                    @endif
                    </td>
                    <td>{{ $staff->designation }}</td>
                    <td><a href="{{ asset('public/images/staffs/'.$staff->image) }}" target="_blank"><img src="{{ asset('public/images/staffs/'.$staff->image) }}" alt="" style="width: 50px; height: 50px;"></a></td>
                    <td>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $staff->id }}"><i class="fa fa-fw fa-edit"></i>Edit</button>
                      <div class="modal fade" id="editModal{{ $staff->id }}" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Edit Staff</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form class="form-control" action="{{ route('admin.staff.update', $staff->id) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Staff Name <span class="text-danger required">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $staff->name }}" required>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="designation">Designation <span class="text-danger required">*</span></label>
                                    <input type="text" class="form-control" name="designation" id="designation" value="{{ $staff->designation }}" required>
                                  </div>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="department_id">Dean Office / Department <span class="text-danger required">*</span></label>
                                    <select class="form-control department" name="department_id" id="department_id" required>
                                      <option value="dean_office" {{ $staff->department_id == "dean_office" ? 'selected' : '' }}>Dean Office </option>
                                      @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ ($department->id == $staff->department_id) ? 'selected' : '' }}>{{ $department->short_name }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="image">Image</label>
                                  <input type="file" name="image" id="image" class="form-control">
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="col-md-6">
                                  <label for="email">Email</label>
                                  <input type="email" name="email" id="email" class="form-control" value="{{ $staff->email }}">
                                </div>
                                <div class="col-md-6">
                                  <label for="phone">Phone</label>
                                  <input type="text" name="phone" id="phone" class="form-control" value="{{ $staff->phone }}">
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update Staff</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $staff->id }}"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $staff->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this staff ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.staff.delete', $staff->id) }}" method="post">
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
          <h5 class="modal-title" id="exampleModalLongTitle">Add Staff</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form class="form-control" action="{{ route('admin.staff.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Staff Name <span class="text-danger required">*</span></label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Staff name" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="designation">Designation <span class="text-danger required">*</span></label>
                <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" required>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="department_id">Dean Office / Department <span class="text-danger required">*</span></label>
                <select class="form-control department" name="department_id" id="department_id" required>
                  <option value="">Select Office </option>
                  <option value="dean_office">Dean Office </option>
                  @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->short_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label for="image">Image</label>
              <input type="file" name="image" id="image" class="form-control">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
            </div>
            <div class="col-md-6">
              <label for="phone">Phone</label>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Staff</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
