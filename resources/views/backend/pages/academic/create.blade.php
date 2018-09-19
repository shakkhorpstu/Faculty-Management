@extends('backend.layouts.master')

@section('content')

  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.academic.index') }}">Academic</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ul>
  </div>

  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h2 class="mb-4">About LMA</h2>
            @include('backend.partials.message')
            <div class="tile-body">
              <form class="" action="{{ route('admin.academic.store') }}" method="post">
                @csrf
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <label for="bsc">Description Of B.Sc</label>
                    <textarea name="bsc" class="form-control" id="bsc" rows="8" cols="70" required>
                      @if(!empty($academic))
                        {{ $academic->bsc }}
                      @endif
                    </textarea>
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="msc">Description Of M.Sc</label>
                    <textarea name="msc"  class="form-control" id="msc" rows="8" cols="70" required>
                      @if(!empty($academic))
                        {{ $academic->msc }}
                      @endif
                    </textarea>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <label for="activities">Activities</label>
                    <textarea name="activities" class="form-control" id="activities" rows="8" cols="70" required>
                      @if(!empty($academic))
                        {{ $academic->activities }}
                      @endif
                    </textarea>
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="scholarship">Scholarship</label>
                    <textarea name="scholarship"  class="form-control" id="scholarship" rows="8" cols="70" required>
                      @if(!empty($academic))
                        {{ $academic->scholarship }}
                      @endif
                    </textarea>
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
