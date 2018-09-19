@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Download</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Files Of LMA</span>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addModal">Add File</button>
          </div>
        </div>
        @include('backend.partials.message')
        <div class="tile-body mt-4">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>File Title</th>
                <th>File type</th>
                <th>File</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(!empty($downloads))
                @foreach($downloads as $download)
                  <tr>
                    <td>{{ $download->title }}</td>
                    <td>
                      {{ ($download->type == 1) ? 'Result File' : 'Others File' }}
                    </td>
                    <td><a href="{{ asset('public/files/downloads/'.$download->file) }}" target="_blank"><img src="{{ asset('public/images/defaults/pdf.png') }}" style="width: 50px; height: 50px;" alt=""></a></td>
                    <td>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $download->id }}"><i class="fa fa-fw fa-edit"></i>Edit</button>
                      <div class="modal fade" id="editModal{{ $download->id }}" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Edit File Information</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>

                            <form class="form-control" action="{{ route('admin.download.update', $download->id) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label for="title">File Title</label>
                                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{ $download->title }}" required>
                              </div>

                              <div class="form-group">
                                <label for="file">File @if(!is_null($download->file)) <a href="{{ asset('public/files/downloads/'.$download->file) }}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-fw fa-download"></i>Existing File</a>  @endif</label>
                                <input type="file" class="form-control" name="file" id="file">
                              </div>

                              <div class="form-group">
                                <label for="type">File Type</label>
                                <select class="form-control department" name="type" id="type" required>
                                  <option value="1" {{ ($download->type == 1) ? 'selected' : '' }}>Result File</option>
                                  <option value="0" {{ ($download->type == 0) ? 'selected' : '' }}>Others File</option>
                                </select>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update File</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $download->id }}"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $download->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this file ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.download.delete',$download->id) }}" method="post">
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

  <!-- Add Modal -->
  <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form class="form-control" action="{{ route('admin.download.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">File Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="File title" required>
          </div>

          <div class="form-group">
            <label for="file">File</label>
            <input type="file" class="form-control" name="file" id="file" required>
          </div>

          <div class="form-group">
            <label for="type">File Type</label>
            <select class="form-control department" name="type" id="type" required>
              <option value="">Select Type</option>
              <option value="1">Result File</option>
              <option value="0">Other File</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add File</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
