
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
                            @foreach($datas as $data)
                                <table class="">

                                    <tr>
                                        <td>
                                            <p>NIP </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->nip}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Nama Karyawan </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->name}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Email </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->email}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>No. Telp </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->tlp}}</p>
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
                                            <p>Deskripsi </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->diskripsi_peminjaman}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Tanggal Pinjam </p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->tgl_pinjam}}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Tanggal kembali</p>
                                        </td>
                                        <td>
                                            <p>:    </p>
                                        </td>
                                        <td>
                                            <p>{{$data->tgl_kembali}}</p>
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
{{--                        <embed width="100%" height="450" src="{{$gambar}}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf"></embed>--}}
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

