
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
                Page Lokasi Simpan
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
{{--                <li><a href="#">Master</a></li>--}}
                <li class="active">Page Simpan</li>
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
                            <h3 class="box-title">Form Tambah Lokasi</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('lokasi-simpan')}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Gedung</label>
                                    <input type="text" class="form-control" id="gedung" name="gedung" placeholder="1">
                                </div>
                                <div class="form-group">
                                    <label>Rak</label>
                                    <input type="text" class="form-control" id="rak" name="rak" placeholder="1">
                                </div>
                                <div class="form-group">
                                    <label>Baris</label>
                                    <input type="text" class="form-control" id="baris" name="baris" placeholder="1">
                                </div>
                                <div class="form-group">
                                    <label>Boks</label>
                                    <input type="text" class="form-control" id="boks" name="boks" placeholder="1">
                                </div>
                                <div class="form-group">
                                    <label>Folder</label>
                                    <input type="text" class="form-control" id="folder" name="folder" placeholder="1">
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Lokasi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Gedung</th>
                            <th>Rak</th>
                            <th>Baris</th>
                            <th>Boks</th>
                            <th>Folder</th>
                            <th>Tools</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($lokasi))
                            @foreach($lokasi as $data)
                                <tr>
                                    <td>{{$data->gedung}}</td>
                                    <td>{{$data->rak}}</td>
                                    <td>{{$data->baris}}</td>
                                    <td>{{$data->bok}}</td>
                                    <td>{{$data->folder}}</td>
                                    <td>
                                        <a href="#" class="on-default edit-row" data-id="{{$data->id}}" data-gedung="{{$data->gedung}}"
                                           data-rak="{{$data->rak}}" data-baris="{{$data->baris}}" data-boks="{{$data->bok}}"
                                           data-folder="{{$data->folder}}" data-toggle="modal" data-target="#modal-default">
                                            <i class="fa fa-pencil" ></i>
                                        </a>
                                        <a>/</a>
                                        <a href="{{url('hapus-lokasi/'.$data->id)}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                        @endif

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Gedung</th>
                            <th>Rak</th>
                            <th>Baris</th>
                            <th>Boks</th>
                            <th>Folder</th>
                            <th>Tools</th>
                        </tr>
                        </tfoot>
                    </table>

                    <!-- ===================Modal Edit============================ -->
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Form Update Lokasi</h4>
                                </div>

                                <div class="modal-body">

                                    <form class="form-horizontal" action="{{url('update-lokasi')}}" method="post">
                                        {{csrf_field()}}

                                        <div class="box-body">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="id" name="id">
                                            </div>
                                            <div class="form-group">
                                                <label>Gedung</label>
                                                <input type="text" class="form-control" id="gedung" name="gedung" placeholder="1" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Rak</label>
                                                <input type="text" class="form-control" id="rak" name="rak" placeholder="No PP.No AP.No P" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Baris</label>
                                                <input type="text" class="form-control" id="baris" name="baris" placeholder="PP.AP.P" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Boks</label>
                                                <input type="text" class="form-control" id="boks" name="boks" placeholder="PP.AP.P" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Folder</label>
                                                <input type="text" class="form-control" id="folder" name="folder" placeholder="PP.AP.P" required>
                                            </div>

                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                        </div>

                                    </form>
                                </div>

                            </div>

                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                </div>
                <!-- /.box-body -->
            </div>

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
    $('#modal-default').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var no_takah = button.data('jenis') // Extract info from data-* attributes
        var gedung = button.data('gedung') // Extract info from data-* attributes
        var rak = button.data('rak') // Extract info from data-* attributes
        var baris = button.data('baris') // Extract info from data-* attributes
        var boks = button.data('boks') // Extract info from data-* attributes
        var folder = button.data('folder') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        console.log(id)
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #id').val(id)
        // modal.find('.modal-body #jenis').val(jenis)
        modal.find('.modal-body #gedung').val(gedung)
        modal.find('.modal-body #rak').val(rak)
        modal.find('.modal-body #baris').val(baris)
        modal.find('.modal-body #boks').val(boks)
        modal.find('.modal-body #folder').val(folder)
    })
</script>

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
