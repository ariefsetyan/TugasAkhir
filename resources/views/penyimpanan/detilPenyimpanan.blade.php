
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}



<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

@include('navbar.navbar')

@include('menu.menu')

<!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="row">

                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="btn btn-social btn-bitbucket">
                                        <i class="fa fa-reply"></i> Back
                                    </a>
                                </div>
                                <div class="col-md-8"><h3 class="box-title center">Lokasi Dokumen Disimpan</h3></div>

                            </div>


                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            @foreach($dokumen as $data)
                                <table class="">

                                    <tr>
                                        <td>
                                            <p>Kode Dokumen </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->kode_jenis}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Nama Jenis Dokumen </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->nama_jenis}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Sub Nama Jenis Dokumen </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->nm_jenis_jra}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Nama Dokumen </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->nama_dokumen}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Diskripsi </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->diskripsi}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Kurun Waktu </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->kurun_waktu}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Tingkat Perkembangan </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->tingkat_perkembangan}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Media Arsip </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->media_arsip}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Kondisi </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->kondisi}}</p>
                                        </td>
                                    </tr>
{{--                                    @foreach($lokasiarsip as $lokasi)--}}
                                    <tr>
                                        <td>
                                            <p>Gedung </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->gedung}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Rak </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->rak}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Baris </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->baris}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Boks </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->bok}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Folder </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->folder}}</p>
                                        </td>
                                    </tr>
{{--                                        @endforeach--}}
                                    <tr>
                                        <td>
                                            <p>aktif </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->aktif}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Inaktif </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->inaktif}}</p>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        </div>
                        <div class="box-footer">
                            {{--                            <a class="btn btn-block btn-social btn-bitbucket">--}}
                            {{--                                <i class="fa fa-bitbucket"></i> Sign in with Bitbucket--}}
                            {{--                            </a>--}}
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Horizontal Form</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
{{--                        {{$file}}--}}
                        <embed width="100%" height="450" src="{{$gambar}}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf"></embed>
{{--                        <embed width="535" height="450" src="{{$gambar}}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf"></embed>--}}
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.13
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->

<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>

</body>
</html>

