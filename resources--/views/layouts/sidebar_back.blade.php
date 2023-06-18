<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link text-decoration-none py-3">
    <img src="{{ asset('images/bcps.png') }}" alt="BCPS Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">BCPS ERP</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

        @php if (in_array(1, $menus)) { @endphp
        <li class="nav-header bg-warning" style="margin-left:-8px; margin-right:-8px;">IT Department</li>
        <li class="nav-item mt-1">
          <a href="{{ route('it-dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>IT Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('mothersubjects.index') }}" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>Mother Subject Info</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('subjects.index') }}" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>Subject Info</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('allied-subjects.index') }}" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>Allied Subject Info</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('exam-halls.index') }}" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>Hall Info</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('exam-schedule-roles.index') }}" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>Schedule Position Info</p>
              </a>
            </li>
          </ul>
        </li>
        @php } @endphp
        @php if (in_array(8, $menus)) { @endphp
        <li class="nav-header bg-warning" style="margin-left:-8px; margin-right:-8px;">Administration Dept.</li>
        <li class="nav-item mt-1">
          <a href="{{ route('admin-dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Admin Dashboard</p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Golden Jubilee 2022
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('jubilee-applicant-list') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Applicant List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('jubilee-picture-view') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Picture View</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              14th Convocation
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('convocation-applicant-list') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Applicant List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('convocation-picture-view') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Picture View</p>
              </a>
            </li>
          </ul>

        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Trainee
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('show-trainee-sub-mig') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Trainee Subject switch</p>
              </a>
            </li>
          </ul>
        </li>

        @php } @endphp

        @php if (in_array(1, $menus)) { @endphp
        <li class="nav-header bg-warning" style="margin-left:-8px; margin-right:-8px;">Examination Dept.</li>
        <li class="nav-item mt-1">
          <a href="{{ route('exam-dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Exam Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('list-exam-info-update') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Exam Info Update</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-calendar"></i>
            <p>
              OSPE/IOE Scheduling
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('show-ospeioe') }}" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>Schedule Setting</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('landing-details') }}" class="nav-link">
                <i class="nav-icon fa-solid fa-plus"></i>
                <p>Add Schedule Details</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('ospeioe-reports') }}" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>Reportings</p>
              </a>
            </li>
          </ul>
        </li>
        @php } @endphp
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>