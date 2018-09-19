<div class="header-top-nav">
  <ul>
    @if(Auth::guard('teacher')->guest())
      <li><a class="text-white" href="{{ route('teacher.login') }}">Teacher Login</a></li>
    @else
      <li><a class="text-white" href="{{ route('teacher.dashboard') }}">Dashboard</a></li>
    @endif
  </ul>
</div>

<div class="header-logo">
  <div class="container">
    <div class="row">
      <div class="col-md-11 text-center">
        <h5 class="header-versity-name">Patuakhali Science and Technology University</h5>
        <h4 class="header-faculty-name text-center">Faculty Of Land Management and Administration</h4>
      </div>
      <div class="col-md-1">
        <img src="{!! asset('public/images/logos/logo.jpg') !!}" class="img img-fluid">
      </div>
    </div>
  </div>
</div>

<!-- Navbar Part -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="fa fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{!! route('index') !!}">Home <span class="sr-only"></span></a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            About
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('about.overview') }}">Overview</a>
            <a class="dropdown-item" href="{{ route('about.vision') }}">Vision</a>

          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{!! route('notice.index') !!}">Notices</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Academic
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('academic.bsc') }}">B.Sc in LMA</a>
            <a class="dropdown-item" href="{{ route('academic.msc') }}">M.Sc in LMA</a>
            <a class="dropdown-item" href="{{ route('academic.activities') }}">Activities Of LMA</a>
            <a class="dropdown-item" href="{{ route('academic.scholarship') }}">Scholarship</a>

          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{!! route('administration') !!}">Administration</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Departments
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            @foreach(\App\Models\Department::departments() as $department)
              <a class="dropdown-item" href="{{ route('department.index', $department->short_name) }}">{{ $department->name }}</a>
            @endforeach
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Downloads
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('download.form') }}">Forms</a>
            <a class="dropdown-item" href="{{ route('download.result') }}">Results</a>

          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{!! route('gallery') !!}">Gallery</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<!--End Navbar Part -->
