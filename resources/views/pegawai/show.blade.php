
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">

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
                Page View Pegawai
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('karyawan')}}">Pegawai</a></li>
                <li class="active">Page View Pegawai</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">

                        </div>
                        <div class="box-body">
                            <table class="">
                            @foreach($karyawan as $data)
                            <tr>
                                <td>
                                    <p>nip </p>
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
                                    <p>nama_pegawai </p>
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
                                    <p>alamat_pegawai </p>
                                </td>
                                <td>
                                    <p>:    </p>
                                </td>
                                <td>
                                    <p>{{$data->address}}</p>
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    <p>jkl_pegawai </p>
                                </td>
                                <td>
                                    <p>:    </p>
                                </td>
                                <td>
                                    <p>{{$data->gender}}</p>
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    <p>email_pegawai </p>
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
                                    <p>tlp_pegawai </p>
                                </td>
                                <td>
                                    <p>:    </p>
                                </td>
                                <td>
                                    <p>{{$data->tlp}}</p>
                                </td>
                            </tr>

                            @endforeach
                        </table>
                        </div>
                    </div>
                    <!-- /.box -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@include('footer')

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
</body>
</html>
