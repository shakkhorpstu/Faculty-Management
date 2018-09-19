@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.notice.index') }}">Notice</a></li>
      <li class="breadcrumb-item active">Add</li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-table"></i> <span class="ml-2">Add Notice</span>
          </div>
        </div>
        @include('backend.partials.message')
        <div class="tile-body mt-4">
          <form class="" action="{{ route('admin.notice.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="title">Notice Title <span class="text-danger required">*</span></label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Notice title" required>
              </div>
              <div class="col-md-3 form-group">
                <label for="notice_news_event">Notice Type <span class="text-danger required">*</span></label>
                <select class="form-control" name="notice_news_event" id="notice_news_event">
                  <option value="">Select Notice Type</option>
                  <option value="0">Notice</option>
                  <option value="1">News</option>
                  <option value="2">Event</option>
                </select>

              </div>
              <div class="col-md-2 offset-md-1 form-group">
                <label for="">Notice Status</label>
                <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="status" id="status" value="1" checked>Publish
                    </label>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-8 form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="8" cols="70"></textarea>
              </div>
              <div class="col-md-4 form-group">
                <label for="file">File</label>
                <input type="file" name="file" class="form-control" id="file">
              </div>
            </div>

            <button type="submit" class="btn btn-success float-right">Save Information</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
