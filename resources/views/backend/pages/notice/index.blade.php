@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">Notice</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Notice Of LMA</span>
            <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.notice.create') }}">Add Notice</a>
          </div>
        </div>
        @include('backend.partials.message')
        <div class="tile-body mt-4">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>Title</th>
                <th>Notice Type</th>
                <th>File</th>
                <th>Status</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(!empty($notices))
                @foreach($notices as $notice)
                  <tr>
                    <td>{{ $notice->title }}</td>
                    <td>
                      @if($notice->notice_news_event == 0)
                        {{ "Notice" }}
                      @elseif($notice->notice_news_event == 1)
                        {{ "News" }}
                      @else
                        {{ "Event" }}
                      @endif
                    </td>
                    <td>
                      @if(!is_null($notice->file))
                        <a href="{{ asset('public/files/notices/'.$notice->file) }}" target="_blank"><img src="{{ asset('public/images/defaults/pdf.png') }}" alt="" style="width: 50px; height: 50px;"></a>
                      @else
                        {{ "N/A" }}
                      @endif
                    </td>
                    <td>
                      @if($notice->status == 1)
                        <span class="badge badge-success">{{ "Published" }}</span>
                      @else
                        <span class="badge badge-danger">{{ "Not Published" }}</span>
                      @endif
                    </td>
                    <td>
                      @if($notice->status == 1)
                        <a href="{{ route('admin.notice.unpublish', $notice->id) }}" class="btn btn-warning btn-sm" title="Unpublish this notice">Unpublish</a>
                      @else
                        <a href="{{ route('admin.notice.publish', $notice->id) }}" class="btn btn-success btn-sm" title="Publish this notice">Publish</a>
                      @endif
                      <a href="{{ route('admin.notice.edit', $notice->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $notice->id }}"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $notice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this notice ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.notice.delete', $notice->id) }}" method="post">
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
