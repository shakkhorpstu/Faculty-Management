@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Dean</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Deans Of LMA</span>
            <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.dean.create') }}">Add Dean</a>
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
                <th>Designation</th>
                <th>Status</th>
                <th>Image</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(!empty($deans))
                @foreach($deans as $dean)
                  <tr>
                    <td>{{ $dean->first_name.' '.$dean->last_name }}</td>
                    <td>{{ $dean->email }}</td>
                    <td>{{ $dean->phone_no }}</td>
                    <td>
                      @if($dean->designation == 0)
                        {{ "Professor" }}
                      @elseif($dean->designation == 1)
                        {{ "Asscociate Professor" }}
                      @elseif($dean->designation == 2)
                        {{ "Assistant Professor" }}
                      @elseif($dean->designation == 3)
                        {{ "Lecturer" }}
                      @endif
                    </td>
                    <td>
                      @if($dean->status == 1)
                        {{ "Present Dean" }}
                      @else
                        {{ "Previous Dean" }}
                      @endif
                    </td>
                    <td><a href="{{ asset('public/images/deans/'.$dean->image) }}" target="_blank"><img src="{{ asset('public/images/deans/'.$dean->image) }}" alt="" style="width: 50px; height: 50px;"></a></td>
                    <td>
                      @if($dean->status == 0)
                        <a href="{{ route('admin.dean.present', $dean->id) }}" class="btn btn-success btn-sm" title="Promote as a present dean">Present</a>
                      @else
                        <a href="{{ route('admin.dean.previous', $dean->id) }}" class="btn btn-warning btn-sm" title="Make previous dean">Previous</a>
                      @endif
                      <a href="{{ route('admin.dean.edit', $dean->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $dean->id }}"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $dean->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this dean ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.dean.delete', $dean->id) }}" method="post">
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
