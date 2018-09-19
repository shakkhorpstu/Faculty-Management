<div class="col-md-3 offset-md-1">
  @if(Auth::guard('teacher')->user()->image != null)
    <img src="{{ asset('public/images/teachers/'.Auth::guard('teacher')->user()->image) }}" class="img img-fluid rounded-circle mb-2">
  @else
    <img src="{{ asset('public/images/defaults/default.png') }}" class="img img-fluid rounded-circle mb-2">
  @endif
  <div class="list-group">
    <a href="{{ route('teacher.dashboard') }}" class="list-group-item">Dashboard</a>
    <a href="{{ route('teacher.dashboard.edit') }}" class="list-group-item">Edit Profile</a>
    <a href="{{ route('teacher.dashboard.material') }}" class="list-group-item">Course Material</a>
    <a href="{{ route('teacher.changePasswordForm') }}" class="list-group-item">Change Password</a>
    <a href="{{ route('teacher.dashboard.logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();" class="list-group-item">Logout</a>
    <form id="logout-form" action="{{ route('teacher.dashboard.logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</div>
