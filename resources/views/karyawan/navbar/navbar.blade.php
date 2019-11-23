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
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">0</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 0 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> tidak ada permohonan peminjaman dokumen
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>


                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
{{--                        <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">--}}
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">

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