<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('backEnd') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <ul class="dash-pro"> {{-- checking whether you have permission or not to access admin Dashboard --}} 
      @if(Auth::guard('admin')->user()->can('admin.dashboard')) <li class="list">
        <div class="user-panel py-3 d-flex active">
          <div class="image">
            <img src="{{ asset('backEnd') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
              alt="User Image">
          </div>
          <div class="info">
            <a href="{{ route('admin.dashboard')}}" class="d-block">Admin Dashboard</a>
          </div>
        </div>
        <ul class="nav nav-treeview sidemenu">
          <li class="nav-item mt-2">
            <a href="{{ route('admin.admin.index')}}" class="nav-link">
              <p class="pstyle">Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <div class="nav-link">
              <form action="{{ route('admin.logout.submit') }}" method="POST"> @csrf <button type="submit"
                  class="btn btn-logout">
                  <p class="pstyle">Logout</p>
                </button>
              </form>
            </div>
          </li>
        </ul>
      </li> @endif </ul>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul id="sidebar-id" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library --> {{-- checking whether you have permission or not to
        access admin --}} 
        @if(Auth::guard('admin')->user()->can('admin.only')) <li class="nav-item menu-open list">
          <a href="{{ route('admin.admin.index')}}"
            class="nav-link {{ Route::is('admin.admin.create') || Route::is('admin.admin.index') || Route::is('admin.admin.edit') ? 'active' : '' }}">
            <p> Supper Admin <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview sidemenu">
            <li class="nav-item mt-2">
              <a href="{{ route('admin.admin.index')}}"
                class="nav-link {{ Route::is('admin.admin.index') ? 'active' : '' }}">
                <p>All Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.admin.create')}}"
                class="nav-link {{ Route::is('admin.admin.create') ? 'active' : '' }}">
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li> @endif {{-- checking whether admin have permission or not to access --}} 
        @if(Auth::guard('admin')->user()->can('admin.show')) <li class="nav-item menu-open list">
          <a href="{{ route('admin.admin.index')}}"
            class="nav-link {{ Route::is('admin.admin.create') || Route::is('admin.admin.index') || Route::is('admin.admin.edit') || Route::is('admin.role.index') || Route::is('admin.role.create') || Route::is('admin.role.edit') ? 'active' : '' }}">
            <p> Admin <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview sidemenu">
            <li class="nav-item mt-2">
              <a href="{{ route('admin.admin.index')}}"
                class="nav-link {{ Route::is('admin.admin.index') ? 'active' : '' }}">
                <p>All Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.admin.create')}}"
                class="nav-link {{ Route::is('admin.admin.create') ? 'active' : '' }}">
                <p>Add New</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.role.index')}}"
                class="nav-link {{ Route::is('admin.role.index') || Route::is('admin.role.create') || Route::is('admin.role.edit') ? 'active' : '' }}">
                <p>Roles</p>
              </a>
            </li>
          </ul>
        </li> @endif {{-- checking whether user have permission or not to access --}} 
        @if(Auth::guard('admin')->user()->can('user.show')) <li class="nav-item menu-open list">
          <a href="{{ route('admin.user.index')}}"
            class="nav-link {{ Route::is('admin.user.create') || Route::is('admin.user.index') || Route::is('admin.user.edit') || Route::is('admin.role.index') || Route::is('admin.role.create') || Route::is('admin.role.edit') ? 'active' : '' }}">
            <p> User <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview sidemenu">
            <li class="nav-item mt-2">
              <a href="{{ route('admin.user.index')}}"
                class="nav-link {{ Route::is('admin.user.index') ? 'active' : '' }}">
                <p>All User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.user.create')}}"
                class="nav-link {{ Route::is('admin.user.create') ? 'active' : '' }}">
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li> @endif
      </ul>
      </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>