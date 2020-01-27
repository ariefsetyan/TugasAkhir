
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
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('bower_components/select2/dist/css/select2.min.css')}}">
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
            <!-- /.box -->
            <div class="box">
                <div class="box-header">
{{--                    <a href="{{url('eksekusi')}}"><button type="submit" class="btn btn-default">Eksekusi</button></a>--}}
{{--                    <a href="{{url('pdf')}}"><button type="submit" class="btn btn-default">Print</button></a>--}}

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Dokumen</th>
                            <th>Dokumen</th>
                            <th>Kurun Waktu</th>
                            <th>Timgakt perkembangan</th>
                            <th>media</th>
                            <th>kondisi</th>
                            <th>Status</th>
                            <th>Tools</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1?>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$data->kode_jenis}}</td>
                                <td>{{$data->nama_dokumen}}</td>
                                <td>{{$data->kurun_waktu}}</td>
                                <td>{{$data->tingkat_perkembangan}}</td>
                                <td>{{$data->kondisi}}</td>
                                <td>{{$data->media_arsip}}</td>
                                <td>
                                    @if($data->status == 'musnah')
                                        <span class="label label-danger">{{$data->status}}</span>
                                    @elseif($data->status == 'ditinjau ulang')
                                        <span class="label label-warning">{{$data->status}}</span>
                                    @elseif($data->status == 'aktif')
                                        <span class="label label-success">{{$data->status}}</span>
                                    @elseif($data->status == 'inaktif')
                                        <span class="label label-primary">{{$data->status}}</span>
                                    @else
                                        <span class="label label-success">aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('preview-dokumen/'.$data->id)}}" class="on-default edit-row">
                                        <i class="fa fa-eye" > View</i>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Dokumen</th>
                            <th>Dokumen</th>
                            <th>Kurun Waktu</th>
                            <th>Timgakt perkembangan</th>
                            <th>media</th>
                            <th>kondisi</th>
                            <th>Status</th>
                            <th>Tools</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            {{--            </form>--}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('footer')

    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('sweetalert::alert')

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
