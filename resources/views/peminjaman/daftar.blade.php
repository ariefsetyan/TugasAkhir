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
                Page daftar peminjaman

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
{{--                <li><a href="#">Examples</a></li>--}}
                <li class="active">Page daftar peminjaman</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->

            <!-- /.box -->

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Peminjaman</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>NIP</th>
                            <th>karyawan</th>
                            <th>nama dokumen</th>
                            <th>tanggal pinjam</th>
                            <th>Tools</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->nip}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->nama_dokumen}}</td>
                                <td>{{$data->tgl_pinjam}}</td>
                                <td>
                                    <a href="{{url('detil-peminjaman/'.$data->id)}}" class="on-default remove-row"><i class="fa fa-eye"></i></a>
                                    <a>/</a>
                                    <a href="{{url('edit-peminjaman/'.$data->id)}}" class="on-default remove-row"><i class="fa fa-pencil"></i></a>/
                                    <a href="{{url('delete-peminjaman/'.$data->id)}}" class="on-default edit-row" >
                                        <i class="fa fa-trash-o" ></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <!--model-->
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Default Modal</h4>
                                    </div>

                                    <div class="modal-body">

                                        <form class="form-horizontal" action="{{url('edit-jra')}}" method="post">
                                            {{csrf_field()}}

                                            <input type="text" class="hidden" id="id" placeholder="PP.AP.P" name="id">

                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label>NIP Karyawan</label>
{{--                                                    <input type="text" name="nip" id="nip">--}}
                                                    <select class="form-control select2" style="width: 100%;" name="nip" id="Nip">
{{--                                                        <option selected="selected">Select ...</option>--}}
                                                        @foreach($karyawans as $karyawan)
                                                            <option value="{{$karyawan->id}}">{{$karyawan->nip}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Dokumen</label>
                                                    <select class="form-control select2" style="width: 100%;" name="dokumen">
                                                        <option selected="selected">Select ...</option>
                                                        @foreach($dokumens as $dokumen)
                                                            <option value="{{$dokumen->id}}">{{$dokumen->diskripsi}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="deskripsi" id="deskripsi"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Waktu Pinjam</label>
                                                    <input type="date" class="form-control" name="wPinjam" id="tglPinjam">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Kembali</label>
                                                    <input type="date" class="form-control" name="wKembali" id="tglKembali">
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info pull-right">Sign in</button>
                                            </div>

                                        </form>
                                    </div>

                                </div>

                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>

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
@include('sweetalert::alert')

<!-- jQuery 3 -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
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

<!--Model-->

<script>
    $('#modal-default').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var nip = button.data('nip') // Extract info from data-* attributes
        var nama = button.data('namadokumen') // Extract info from data-* attributes
        var deskripsi = button.data('deskripsi') // Extract info from data-* attributes
        var tglPinjam = button.data('tglpinjam') // Extract info from data-* attributes
        var tglKembali = button.data('tglkembali') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        console.log(id,nip,nama)
        console.log(tglKembali,nama,tglPinjam)
        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #Nip').val(nip)
        modal.find('.modal-body #dokumen').val(nama)
        modal.find('.modal-body #deskripsi').val(deskripsi)
        modal.find('.modal-body #tglPinjam').val(tglPinjam)
        modal.find('.modal-body #tglKembali').val(tglKembali)
    })
</script>
</body>
</html>
