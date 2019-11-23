<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>LAPAN</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications: style can be found in dropdown.less -->
                {{--                @if(!empty(DB::table('peminjamen as p')->where('id_status','=',3)->count()))--}}
                {{--                <li class="dropdown notifications-menu">--}}
                {{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--                        <i class="fa fa-bell-o"></i>--}}
                {{--                        <span class="label label-warning">--}}
                {{--                            {{DB::table('peminjamen as p')->where('id_status','=',3)->count()}}--}}
                {{--                        </span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu">--}}
                {{--                        <li class="header">You have--}}
                {{--                            {{DB::table('peminjamen as p')->where('id_status','=',3)->count()}}--}}
                {{--                            notifications</li>--}}
                {{--                        <li>--}}
                {{--                            <!-- inner menu: contains the actual data -->--}}
                {{--                            <ul class="menu">--}}
                {{--                                <li>--}}
                {{--                                    <a href="#">--}}
                {{--                                        <i class="fa fa-users text-aqua"></i>--}}
                {{--                                        0--}}
                {{--                                        permohonan peminjaman dokumen--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </li>--}}
                {{--                        <li class="footer"><a href="{{url('daftar-permohonan')}}">View all</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                {{--                @else--}}


{{--                <li class="dropdown notifications-menu">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-bell-o"></i>--}}
{{--                        <span class="label label-warning">0</span>--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li class="header">You have 0 notifications</li>--}}
{{--                        <li>--}}
{{--                            <!-- inner menu: contains the actual data -->--}}
{{--                            <ul class="menu">--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="fa fa-users text-aqua"></i> tidak ada permohonan peminjaman dokumen--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="footer"><a href="#">View all</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                {{--                @endif--}}
            <!-- Tasks: style can be found in dropdown.less -->

{{--                <li class="dropdown tasks-menu">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-flag-o"></i>--}}
{{--                        <span class="label label-danger">9</span>--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li class="header">You have 9 tasks</li>--}}
{{--                        <li>--}}
{{--                            <!-- inner menu: contains the actual data -->--}}
{{--                            <ul class="menu">--}}
{{--                                <li><!-- Task item -->--}}
{{--                                    <a href="#">--}}
{{--                                        <h3>--}}
{{--                                            Design some buttons--}}
{{--                                            <small class="pull-right">20%</small>--}}
{{--                                        </h3>--}}
{{--                                        <div class="progress xs">--}}
{{--                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"--}}
{{--                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                <span class="sr-only">20% Complete</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end task item -->--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="footer">--}}
{{--                            <a href="#">View all tasks</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

                <!-- User Account: style can be found in dropdown.less -->

                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                {{--                        {{ Auth::user()->name }} <span class="caret"></span>--}}
                {{--                    </a>--}}

                {{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                {{--                        <a class="dropdown-item" href="{{ route('logout') }}"--}}
                {{--                           onclick="event.preventDefault();--}}
                {{--                                                     document.getElementById('logout-form').submit();">--}}
                {{--                            {{ __('Logout') }}--}}
                {{--                        </a>--}}

                {{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                {{--                            @csrf--}}
                {{--                        </form>--}}
                {{--                    </div>--}}
                {{--                </li>--}}

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
{{--                        <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">--}}
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                    {{--                        <li class="user-header">--}}
                    {{--                            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}

                    {{--                            <p>--}}
                    {{--                                Alexander Pierce - Web Developer--}}
                    {{--                                <small>Member since Nov. 2012</small>--}}
                    {{--                            </p>--}}
                    {{--                        </li>--}}
                    <!-- Menu Body -->
                    {{--                        <li class="user-body">--}}
                    {{--                            <div class="row">--}}
                    {{--                                <div class="col-xs-4 text-center">--}}
                    {{--                                    <a href="#">Followers</a>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-xs-4 text-center">--}}
                    {{--                                    <a href="#">Sales</a>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-xs-4 text-center">--}}
                    {{--                                    <a href="#">Friends</a>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- /.row -->--}}
                    {{--                        </li>--}}
                    <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>

                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                {{--                                <a href="#" class="btn btn-default btn-flat">Profile</a>--}}
                            </div>
                            <div class="pull-left">
{{--                                <a href="#" class="btn btn-default btn-flat">Profil</a>--}}
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->

            </ul>
        </div>
    </nav>
</header>