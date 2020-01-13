<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li>
                <a href="dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{url('cari')}}">
                    <i class="fa fa-dashboard"></i> <span>Cari Dokumen</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i>
                    <span>Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('karyawan')}}"><i class="fa fa-circle-o"></i> Karyawan</a></li>
                    <li><a href="{{url('lokasi')}}"><i class="fa fa-circle-o"></i> Lokasi</a></li>
                    <li><a href="{{url('jenis-dokumen')}}"><i class="fa fa-circle-o"></i> Jenis Dokumen</a></li>
                    <li><a href="{{url('jra')}}"><i class="fa fa-circle-o"></i> JRA</a></li>
                </ul>
            </li>

            <li>
                <a href="{{url('daftar-dokumen')}}">
                    <i class="fa fa-dashboard"></i> <span>daftar dokumen</span>
                </a>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Penyimpanan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('penyimpanan')}}"><i class="fa fa-circle-o"></i> Form Penyimpanan</a></li>
                    <li><a href="{{url('daftar-penyimpanan')}}"><i class="fa fa-circle-o"></i> Daftar Penyimpanan</a></li>
                    
                </ul>
            </li>

            <li class="treeview">
                <a href="{{url('form-peminjaman')}}">
                    <i class="fa fa-files-o"></i>
                    <span>Peminjaman</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('form-peminjaman')}}"><i class="fa fa-circle-o"></i> Form Peminjaman</a></li>
                    <li><a href="{{url('daftar-peminjaman')}}"><i class="fa fa-circle-o"></i> Daftar Peminjaman</a></li>
{{--                    <li><a href="{{url('daftar-persetujuan')}}"><i class="fa fa-circle-o"></i> Daftar Permohonan</a></li>--}}

                </ul>

            </li>

            <li class="treeview">
                <a href="../widgets.html">
                    <i class="fa fa-folder-open-o"></i>
                    <span>Pengembalian</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('form-pengembalian')}}"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
                    <li><a href="{{url('daftar-pengembalian')}}"><i class="fa fa-circle-o"></i> Daftar pengembalian</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="{{url('')}}">
                    <i class="fa fa-fire"></i>
                    <span>Pemusnahan</span>
                    <span class="pull-right-container"></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('jadwal-retensi')}}"><i class="fa fa-circle-o"></i> Jadwal Pemusnahan</a></li>
                    <li><a href="{{url('daftar-retensi')}}"><i class="fa fa-circle-o"></i> Daftar Retensi</a></li>
                </ul>
            </li>

            <li>
                <a href="{{url('arcive-dokumen')}}">
                    <i class="fa fa-dashboard"></i> <span>arcive dokumen</span>
                </a>
            </li>

{{--            <li>--}}
{{--                <a href="{{url('#')}}">--}}
{{--                    <i class="fa fa-th"></i>--}}
{{--                    <span>Dokumen Retensi</span>--}}
{{--                    <span class="pull-right-container"></span>--}}
{{--                    <span class="pull-right-container">--}}
{{--                        <i class="fa fa-angle-left pull-right"></i>--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-dashboard"></i>--}}
{{--                    <span>Laporan</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--                        <i class="fa fa-angle-left pull-right"></i>--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i> dokumen tidak aktif</a></li>--}}
{{--                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> dokumen aktif</a></li>--}}
{{--                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> peminjaman</a></li>--}}
{{--                    <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> pengembalian</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            ===============================--}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>