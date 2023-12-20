<aside class="left-sidebar" data-sidebarbg="skin6">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li class="sidebar-item @if(Route::current()->getName() == 'home') selected @endif">
          <a class="sidebar-link sidebar-link" href="{{ url('home') }}" aria-expanded="false">
            <i data-feather="home" class="feather-icon"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Examination Scheduling</span></li>
        <li class="sidebar-item @if(Request::segment(2) == 'edit-ospe-ioe-details-schedule') selected @endif">
          <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <i data-feather="file-text" class="feather-icon"></i>
            <span class="hide-menu">OSPE/OSCE/IOE</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level base-level-line">
            <li class="sidebar-item">
              <a href="{{ route('schedules') }}" class="sidebar-link">
                <span class="hide-menu">Schedules</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('landing-details') }}" class="sidebar-link">
                <span class="hide-menu">Invisilator Selection</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href=" {{ route('ospeioe-reports') }}" class="sidebar-link">
                <span class="hide-menu">Schedule Details</span>
              </a>
            </li>
          </ul>
        </li>
        <!--<li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="ui-cards.html" aria-expanded="false"><i
              data-feather="sidebar" class="feather-icon"></i><span class="hide-menu">Cards
            </span></a>
        </li>-->
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Setup</span></li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="{{ route('examtypes.index') }}" aria-expanded="false">
            <i class='fas fa-book-open'></i>
            <span class="hide-menu">Exam Name Info</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="{{ route('mothersubjects.index') }}" aria-expanded="false">
            <i class="icon-notebook"></i>
            <span class="hide-menu">Mother Subject Info</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="{{ route('subjects.index') }}" aria-expanded="false">
            <i class="icon-notebook"></i>
            <span class="hide-menu">Subject Info</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="{{ route('allied-subjects.index') }}" aria-expanded="false">
            <i class="icon-notebook"></i>
            <span class="hide-menu">Allied Subject Info</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="{{ route('exam-halls.index') }}" aria-expanded="false">
            <i class="fas fa-home"></i>
            <span class="hide-menu">Hall Info</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="{{ route('exam-schedule-roles.index') }}" aria-expanded="false">
            <i class="fas fa-sort-amount-down"></i>
            <span class="hide-menu">Invisilator's Designation</span>
          </a>
        </li>

        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">User Management</span></li>
        <li class="sidebar-item @if(Request::segment(2) == 'users') selected @endif">
          <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <i data-feather="file-text" class="feather-icon"></i>
            <span class="hide-menu">Users</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level base-level-line">
            <li class="sidebar-item">
              <a href="{{ route('users') }}" class="sidebar-link">
                <span class="hide-menu">Users List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('landing-details') }}" class="sidebar-link">
                <span class="hide-menu">Assign Role/Permission</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item @if(Request::segment(2) == 'edit-ospe-ioe-details-schedule') selected @endif">
          <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <i data-feather="file-text" class="feather-icon"></i>
            <span class="hide-menu">Roles</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level base-level-line">
            <li class="sidebar-item">
              <a href="{{ route('schedules') }}" class="sidebar-link">
                <span class="hide-menu">Roles List</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('landing-details') }}" class="sidebar-link">
                <span class="hide-menu">View Role</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="list-divider"></li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link" href="{{ route('logout') }}" aria-expanded="false" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i data-feather="log-out" class="feather-icon"></i>
            <span class="hide-menu">{{ __('Logout') }}</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>