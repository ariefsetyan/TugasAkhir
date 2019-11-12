
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
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


            <!-- /.box -->
            {{--                {{csrf_field()}}--}}
            <div class="box">
                <div class="box-header">
                    {{--                    <h3 class="box-title">Data Table With Full Features</h3>--}}
                    {{--                    <form action="{{url('aju-retensi')}}">--}}
                    {{--                        @foreach($datas as $data)--}}

                    {{--                        @endforeach--}}
                    <a href="{{url('eksekusi')}}"><button type="submit" class="btn btn-default">Eksekusi</button></a>
                    <a href="{{url('pdf')}}"><button type="submit" class="btn btn-default">Print</button></a>
                    {{--                    </form>--}}
                    {{--                    <div class="box-tools">--}}
                    {{--                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">--}}
                    {{--                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">--}}

                    {{--                        <div class="input-group-btn">--}}
                    {{--                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    </div>--}}

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
{{--                                <form role="form" action="{{url('/'.$data->id)}}">--}}

                                    <td>
{{--                                        <select name="status">--}}
{{--                                            @if($data->status == 'musnah' || $data->status == 'Musnah')--}}
{{--                                                <option selected="selected">{{$data->status}}</option>--}}
{{--                                                <option>ditinjau ulang</option>--}}
{{--                                            @elseif(($data->status == 'ditinjau ulang' || $data->status == 'Ditinjau Ulang'))--}}
{{--                                                <option selected="selected">{{$data->status}}</option>--}}
{{--                                                <option>musnah</option>--}}
{{--                                            @endif--}}
{{--                                        </select>--}}

                                            @if($data->status == 'musnah')
                                                <span class="label label-danger">{{$data->status}}</span>
                                            @elseif($data->status == 'ditinjau ulang')
                                                <span class="label label-warning">{{$data->status}}</span>
                                            @endif
                                    </td>
                                    <td>

{{--                                        <button> Eksekusi</button>--}}
                                        <a href="{{url('/'.$data->id)}}" class="on-default edit-row">
                                            <i class="fa fa-eye" > View</i>
                                        </a>
                                    </td>
{{--                                </form>--}}

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
                    <button type="submit" class="btn btn-default">Kirim</button>
                </div>
                <!-- /.box-body -->
            </div>
            {{--            </form>--}}
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
