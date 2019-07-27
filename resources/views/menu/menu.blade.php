<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('jenis-dokumen')}}"><i class="fa fa-circle-o"></i> Jenis Dokumen</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> JRA</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Lokasi</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Karyawan</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Penyimpanan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Form Penyimpanan</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Daftar Penyimpanan</a></li>
                    
                </ul>
            </li>



            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Peminjaman</span>
{{--                    <span class="pull-right-container">--}}
{{--                        <span class="label label-primary pull-right">4</span>--}}
{{--                    </span>--}}
                </a>

            </li>

            <li>
                <a href="../widgets.html">
                    <i class="fa fa-th"></i>
                    <span>Pengembalian</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>

            <li>
                <a href="../widgets.html">
                    <i class="fa fa-th"></i>
                    <span>Jadwal Pemusnahan</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i> dokumen tidak aktif</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> dokumen aktif</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> peminjaman</a></li>
                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> pengembalian</a></li>
                </ul>
            </li>
{{--            ===============================--}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>