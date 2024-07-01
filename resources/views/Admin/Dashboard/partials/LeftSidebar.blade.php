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
                                <a class="dropdown-item" href="{{ route('AdminBasicInformation') }}"><i class="ti-user mr-1 ml-1"></i> My Account</a>
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
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('AdminDashboard') }}" aria-expanded="false"><i class="fas fa-tachometer-alt"></i><span class="hide-menu">Dashboard</span></a></li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('AdminPayments') }}" aria-expanded="false"><i class="fas fa-chart-line"></i><span class="hide-menu">Payments</span></a></li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('AdminCompetetionsDashboard') }}" aria-expanded="false"><i class="fas fa-stopwatch"></i><span class="hide-menu">Competetions</span></a></li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('AdminPlansPricing') }}" aria-expanded="false"><i class="fas fa-file-invoice-dollar"></i><span class="hide-menu"> Plans & Pricing</span></a></li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('AdminTeachers') }}" aria-expanded="false"><i class="fas fa-chalkboard-teacher"></i><span class="hide-menu">Teachers</span></a></li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('AdminStudents') }}" aria-expanded="false"><i class="fas fa-user-graduate"></i><span class="hide-menu">Students</span></a></li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('AdminStudentAgeGroups') }}" aria-expanded="false"><i class="fas fa-calendar-alt"></i><span class="hide-menu">Age Groups</span></a></li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('AdminArticles') }}" aria-expanded="false"><i class="fas fa-newspaper"></i><span class="hide-menu">Articles</span></a></li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('AdminSettings') }}" aria-expanded="false"><i class="fas fa-cog"></i><span class="hide-menu">Settings</span></a></li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/') }}" aria-expanded="false"><i class="fas fa-home"></i><span class="hide-menu">Home Page</span></a></li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <li class="sidebar-item">
                    <form method="post">
                        @csrf
                        <button style="border:none;" class="bg-transparent sidebar-link waves-effect waves-dark sidebar-link" formaction="{{ route('logout') }}" aria-expanded="false"><i class="fas fa-power-off"></i><span class="hide-menu">Logout</span></button>
                    </form>
                </li>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
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
