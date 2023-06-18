<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light justify-content-between">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('home') }}" class="nav-link">Home</a>
    </li>
  </ul>
  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar border">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>
  <ul class="navbar-nav">
    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown user user-menu px-2">
      <a href="#" class="dropdown-toggle text-decoration-none" data-toggle="dropdown">
        <img src="{{ asset('public/images/avatar.png') }}" width="160" height="160" class="user-image" alt="User Image">
        <span class="hidden-xs">{{ Auth::user()->name }}</span>
      </a>
      <ul class="dropdown-menu rounded-bottom">
        <!-- User image -->
        <li class="user-header">
          <img src="{{ asset('public/images/avatar.png') }}" class="img-circle" alt="User Image">
          <p>
            {{ Auth::user()->name }}
            <small>Member since Nov. 2012</small>
          </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <div class="float-start">
            <a href="#" class="btn btn-primary">Profile</a>
          </div>
          <div class="float-end">
            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- /.navbar -->