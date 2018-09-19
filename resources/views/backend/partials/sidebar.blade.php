<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="img img-fluid rounded-circle" src="{{ asset('public/images/defaults/default.png') }}" alt="User Image" style="height: 150px;">
    {{-- <div>
      <p class="app-sidebar__user-name">John Doe</p>
      <p class="app-sidebar__user-designation">Frontend Developer</p>
    </div> --}}
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item {{ (Route::is('admin.dashboard') ? 'active' : '') }}" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    <li class="treeview"><a class="app-menu__item {{ (Route::is('admin.dean.index') || Route::is('admin.dean.create') || Route::is('admin.dean.edit') ? 'active' : '') }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Manage Dean</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{ route('admin.dean.index') }}"><i class="icon fa fa-circle-o"></i> Manage Dean</a></li>
        <li><a class="treeview-item" href="{{ route('admin.dean.create') }}"><i class="icon fa fa-circle-o"></i> Add Dean</a></li>
      </ul>
    </li>
    <li class="treeview"><a class="app-menu__item {{ (Route::is('admin.teacher.index') || Route::is('admin.teacher.create') || Route::is('admin.teacher.edit') ? 'active' : '') }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Teacher</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ (Route::is('admin.teacher.index') ? 'active' : '') }}" href="{{ route('admin.teacher.index') }}"><i class="icon fa fa-circle-o"></i> Manage Teacher</a></li>
        <li><a class="treeview-item {{ (Route::is('admin.teacher.index') ? 'active' : '') }}" href="{{ route('admin.teacher.create') }}"><i class="icon fa fa-circle-o"></i> Add Teacher</a></li>
      </ul>
    </li>
    <li><a class="app-menu__item {{ (Route::is('admin.staff.index') ? 'active' : '') }}" href="{{ route('admin.staff.index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Manage Staff</span></a></li>
    <li class="treeview"><a class="app-menu__item {{ (Route::is('admin.notice.index') || Route::is('admin.notice.create') || Route::is('admin.notice.edit') ? 'active' : '') }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Notice</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{ route('admin.notice.index') }}"><i class="icon fa fa-circle-o"></i> Manage Notice</a></li>
        <li><a class="treeview-item" href="{{ route('admin.notice.create') }}"><i class="icon fa fa-circle-o"></i> Add Notice</a></li>
      </ul>
    </li>
    <li><a class="app-menu__item {{ (Route::is('admin.download.index') ? 'active' : '') }}" href="{{ route('admin.download.index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Manage Download File</span></a></li>
    <li><a class="app-menu__item {{ (Route::is('admin.gallery.index') ? 'active' : '') }}" href="{{ route('admin.gallery.index') }}"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Manage Gallery</span></a></li>
    <li class="treeview"><a class="app-menu__item {{ (Route::is('admin.department.index') || Route::is('admin.department.create') || Route::is('admin.department.edit') ? 'active' : '') }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Department</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ (Route::is('admin.department.index') ? 'active' : '') }}" href="{{ route('admin.department.index') }}"><i class="icon fa fa-circle-o"></i> Manage Department</a></li>
        <li><a class="treeview-item {{ (Route::is('admin.department.index') ? 'active' : '') }}" href="{{ route('admin.department.create') }}"><i class="icon fa fa-circle-o"></i> Add Department</a></li>
      </ul>
    </li>
    <li><a class="app-menu__item {{ (Route::is('admin.course.index') ? 'active' : '') }}" href="{{ route('admin.course.index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Manage Course</span></a></li>
    <li class="treeview"><a class="app-menu__item {{ (Route::is('admin.deanMeritList.index') || Route::is('admin.deanMeritList.create') || Route::is('admin.deanMeritList.edit') ? 'active' : '') }}" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Dean Merit List</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{ route('admin.deanMeritList.index') }}"><i class="icon fa fa-circle-o"></i> Manage List</a></li>
        <li><a class="treeview-item" href="{{ route('admin.deanMeritList.create') }}"><i class="icon fa fa-circle-o"></i> Add Student</a></li>
      </ul>
    </li>
    <li><a class="app-menu__item {{ (Route::is('admin.about.index') || Route::is('admin.about.edit') ? 'active' : '') }}" href="{{ route('admin.about.index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">About</span></a></li>
    <li><a class="app-menu__item {{ (Route::is('admin.academic.index') || Route::is('admin.academic.edit') ? 'active' : '') }}" href="{{ route('admin.academic.index') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Academic</span></a></li>
    <li><a class="app-menu__item {{ (Route::is('admin.changePassword') ? 'active' : '') }}" href="{{ route('admin.changePassword') }}"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Change Password</span></a></li>
    <li><a class="app-menu__item {{ (Route::is('admin.setting.index') ? 'active' : '') }}" href="{{ route('admin.setting.index') }}"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Settings</span></a></li>
  </ul>
</aside>
