<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backEnd') }}/dist/img/AdminLTELogo.png" alt="Auction Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Online Auction</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <ul class="dash-pro">

            {{-- checking whether you have permission or not to access admin Dashboard --}}
            @if (Auth::guard('web')->user()->can('buyer.dashboard'))
                <li class="list">
                    <div class="user-panel py-3 d-flex active">
                        <div class="image">
                            <img src="{{ asset('backEnd') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                                alt="User Image">
                        </div>
                        <div class="info">
                            <a href="{{ route('buyer.buyerDashboard') }}" class="d-block">Buyer Dashboard</a>
                        </div>
                    </div>
                    <ul class="nav nav-treeview sidemenu">
                        <li class="nav-item my-1">
                        <a href="{{ route('buyer.buyerDashboard') }}" class="nav-link py-2" style="font-size: 18px; color:black;">
                          Buyer Dashboard
                        </a>
                    </li>
                        <li class="nav-item mt-2">
                            <a href="{{ route('admin.admin.index') }}" class="nav-link">
                                <p class="pstyle">Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link logout-link w-100">
                                <form class="w-100" action="{{ route('buyer.buyerlogout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-logout logout-btn">
                                        <p class="pstyle">Logout</p>
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- checking whether you have permission or not to access admin Dashboard --}}
            @if (Auth::guard('web')->user()->can('seller.dashboard'))
                <li class="list">
                    <div class="user-panel py-3 d-flex active">
                        <div class="image">
                            <img src="{{ asset('backEnd') }}/dist/img/user2-160x160.jpg"
                                class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="{{ route('seller.sellerDashboard') }}" class="d-block">Seller Dashboard</a>
                        </div>
                    </div>
                    <ul class="nav nav-treeview sidemenu">
                      <li class="nav-item my-1">
                        <a href="{{ route('seller.sellerDashboard') }}" class="nav-link py-2" style="font-size: 18px; color:black;">
                          Seller Dashboard
                        </a>
                    </li>
                        <li class="nav-item mt-1">
                            <a href="{{ route('seller.profileviews', [Auth::guard('web')->user()->id]) }}" class="nav-link py-2" style="font-size: 18px; color:black;">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item mb-1">
                            <div class="nav-link">
                                <form action="{{ route('seller.sellerlogout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-logout py-2" style="font-size: 18px; color:black;">
                                      Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>


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
            <ul id="sidebar-id tree" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                {{-- checking whether user have permission or not to access --}}
                @if (Auth::guard('web')->user()->can('user.show'))
                    <li class="nav-item menu-open list">
                        <a href="{{ route('admin.user.index') }}"
                            class="nav-link {{ Route::is('admin.user.create') || Route::is('admin.user.index') || Route::is('admin.user.edit') || Route::is('admin.role.index') || Route::is('admin.role.create') || Route::is('admin.role.edit') ? 'active' : '' }}">
                            <p>
                                User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview sidemenu">
                            <li class="nav-item mt-2">
                                <a href="{{ route('admin.user.index') }}"
                                    class="nav-link {{ Route::is('admin.user.index') ? 'active' : '' }}">
                                    <p>All User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.user.create') }}"
                                    class="nav-link {{ Route::is('admin.user.create') ? 'active' : '' }}">
                                    <p>Add New</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


                {{-- post route views all user --}}
                {{-- checking whether you have permission or not to access Seller Create Post --}}
                @if (Auth::guard('web')->user()->can('seller.dashboard'))
                    <li class="nav-item menu-open list">
                        <a href="{{ route('seller.post.index') }}"
                            class="nav-link clickable {{ Route::is('seller.post.create') || Route::is('seller.post.index') || Route::is('seller.post.edit') || Route::is('seller.category.index') || Route::is('seller.category.create') || Route::is('seller.category.edit') || Route::is('seller.tag.index') || Route::is('seller.tag.create') || Route::is('seller.tag.edit') ? 'active' : '' }}">
                            <p>
                                Posts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview sidemenu styles">
                            <li class="nav-item mt-2">
                                <a href="{{ route('seller.post.index') }}"
                                    class="nav-link {{ Route::is('seller.post.index') || Route::is('seller.post.edit') ? 'active' : '' }}">
                                    <p>All Posts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('seller.post.create') }}"
                                    class="nav-link {{ Route::is('seller.post.create') ? 'active' : '' }}">
                                    <p>Add New Post</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('seller.category.index') }}"
                                    class="nav-link {{ Route::is('seller.category.index') || Route::is('seller.category.create') || Route::is('seller.category.edit') ? 'active' : '' }}">
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('seller.tag.index') }}"
                                    class="nav-link {{ Route::is('seller.tag.index') || Route::is('seller.tag.create') || Route::is('seller.tag.edit') ? 'active' : '' }}">
                                    <p>Tags</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

