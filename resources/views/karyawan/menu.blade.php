<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
{{--            <div class="pull-left image">--}}
{{--                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="pull-left info">--}}
{{--                <p>Alexander Pierce</p>--}}
{{--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
{{--            </div>--}}
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li>
                <a href="{{url('form-pengajuan')}}">
                    <i class="fa fa-dashboard"></i> <span>Form Pengajuan</span>
                </a>
            </li>

            <li>
                <a href="{{url('daftar-pengajuan')}}">
                    <i class="fa fa-dashboard"></i> <span>Daftar Pengajuan</span>
{{--                    <span class="pull-right-container">--}}
{{--                      <small class="label pull-right bg-yellow">12</small>--}}
{{--                      <small class="label pull-right bg-green">16</small>--}}
{{--                      <small class="label pull-right bg-red">5</small>--}}
{{--                    </span>--}}
                </a>
            </li>

            {{--            ===============================--}}
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">account</li>

            <li>
                <a href="{{url('account')}}">
                    <i class="fa fa-dashboard"></i> <span>Perbarui Password</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>