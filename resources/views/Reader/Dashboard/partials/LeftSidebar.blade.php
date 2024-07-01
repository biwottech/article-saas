<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown mt-3">
                        @if(!is_null(Auth::user()->user_image))
                        <div class="user-pic"><img src="{{ asset('Users/profile_pictures/'.Auth::user()->user_image)}}" alt="users" class="rounded" />
                        </div>
                        @else
                        <div class="user-pic"><img src="{{ asset('Dashboard/assets/images/users/1.jpg')}}" alt="users" class="rounded-circle" width="40" />
                        </div>
                        @endif
                        <div class="user-content hide-menu ml-2">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mb-0 user-name font-medium">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email">{{ Auth::user()->email }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="{{ route('ReaderAccount') }}"><i class="ti-user mr-1 ml-1"></i> My Account</a>
                                <div class="dropdown-divider"></div>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('ReaderDashboard') }}" aria-expanded="false"><i class="fas fa-tachometer-alt"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('ReaderAccount') }}" aria-expanded="false"><i class="fas fa-user-cog"></i><span class="hide-menu"> Account Settings</span></a></li>
                <li class="sidebar-item">
                    <form method="post">
                        @csrf
                        <button style="border:none;" class="bg-transparent sidebar-link waves-effect waves-dark sidebar-link" formaction="{{ route('logout') }}" aria-expanded="false"><i class="fas fa-power-off"></i><span class="hide-menu">Logout</span></button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
