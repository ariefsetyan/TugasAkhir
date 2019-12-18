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

    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }
    </style>

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
                Page Pegawai
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Page Pegawai</li>
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
                            <h3 class="box-title">Form Pegawai</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{url('simpan-karyawan')}}">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="number" class="form-control" name="nip" placeholder="1" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Ex: Areif" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="alamat"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jkl" required>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Ex: Arief@ymail.com" required>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label>Password</label>--}}
{{--                                    <input type="password" class="form-control" name="password" placeholder="Ex: Arief@ymail.com" required>--}}
{{--                                </div>--}}

                                <div class="form-group">
                                    <label>Telp</label>
                                    <input type="number" class="form-control" name="telp" placeholder="Ex: 08921XXX" required>
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
                    <h3 class="box-title">Data Pegawai</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nip</th>
                            <th>Nama </th>
                            <th>Email </th>
                            <th>Telp </th>
                            <th>Tools</th>

                        </tr>
                        </thead>
                        @if(empty($karyawan))
                        @else
                            <tbody>
                            @foreach($karyawan as $data)
                                <tr>
                                    <td>{{$data->nip}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->tlp}}</td>
                                    <td>
                                        <a href="{{url('show/'.$data->nip)}}" class="on-default edit-row">
                                            <i class="fa fa-eye" ></i>
                                        </a>
                                        <a>/</a>
                                        <a href="#" class="on-default edit-row" data-nip="{{$data->nip}}" data-nama="{{$data->name}}"
                                           data-alamat="{{$data->address}}" data-jkl="{{$data->gender}}" data-email="{{$data->email}}" data-telp="{{$data->tlp}}"
                                           data-toggle="modal" data-target="#modal-default">
                                            <i class="fa fa-pencil" ></i>
                                        </a>
                                        <a>/</a>
                                        <a href="{{url('delete-karyawan/'.$data->nip)}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                    </td>

                                </tr>

                            @endforeach


                            <!-- ===================Modal Edit============================ -->

                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Form Update</h4>
                                        </div>

                                        <div class="modal-body">

                                            <form class="form-horizontal" action="{{url('edit-karyawan')}}" method="post">

                                                {{csrf_field()}}
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>NIP</label>
                                                        <input type="number" class="form-control" name="nip" id="nip" placeholder="1" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Ex: Areif" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="alamat" id="alamat"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="form-control" name="jkl" id="jkl" required>
                                                            <option value="pria">Pria</option>
                                                            <option value="wanita">Wanita</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Ex: Arief@ymail.com" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Telp</label>
                                                        <input type="number" class="form-control" name="telp" id="telp" placeholder="Ex: 08921XXX" required>
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
                            <!-- /.modal -->

                            </tbody>


                        @endif
                        <tfoot>
                        <tr>
                            <th>Nip</th>
                            <th>Nama </th>
                            <th>Email </th>
                            <th>Telp </th>
                            <th>Tools</th>
                        </tr>
                        </tfoot>
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

{{--sweetalter--}}

@include('sweetalert::alert')

<script>
    $('#modal-default').on('show.bs.modal', function (event) {
        // console.log('open modals');
        var button = $(event.relatedTarget)
        var nip = button.data('nip')
        var nama = button.data('nama')
        var alamat = button.data('alamat')
        var jkl = button.data('jkl')
        var email = button.data('email')
        var telp = button.data('telp')
        var modal = $(this)
        console.log(alamat)
        modal.find('.modal-body #nip').val(nip)
        modal.find('.modal-body #nama').val(nama)
        modal.find('.modal-body #alamat').val(alamat)
        modal.find('.modal-body #jkl').val(jkl)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #telp').val(telp)
    });


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
