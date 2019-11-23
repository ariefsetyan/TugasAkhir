
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
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">--}}

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
                Page JRA
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
                            <h3 class="box-title">Form JRA</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('simpan-jra')}}" method="post">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Kode Jenis</label>
                                    <select class="form-control select2" style="width: 100%;" name="kdjenis" required>
                                        <option selected="selected">Select...</option>
                                        @if(!empty($jenisDoc))
                                        @foreach($jenisDoc as $jenis)
                                            <option value="{{$jenis->no_takah}}">{{$jenis->kode_jenis}}/ {{$jenis->nama_jenis}}</option>
                                        @endforeach
                                        @else
                                        @endif
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Nama Jenis</label>
                                    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Aktif</label>
                                    <input type="number" class="form-control" id="aktif" placeholder="1" name="aktif" required>
                                </div>
                                <div class="form-group">
                                    <label>Inaktif</label>
                                    <input type="number" class="form-control" id="inaktif" placeholder="1" name="inaktif" required>
                                </div>

                                <div class="form-group">
                                    <label>Sifat Dokumen</label>
                                    <select class="form-control select2" style="width: 100%;" name="sifat" id="sifat" required>
                                        <option selected="selected" value="Permanen">Permanen</option>
                                        <option value="Musnah">Musnah</option>
                                        <option value="Ditinjau Ulang">Ditinjau Ulang</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data JRA</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Kode Jenis</th>
                            <th>nama Jenis</th>
                            <th>aktif</th>
                            <th>inaktif</th>
                            <th>sifat</th>
                            <th>Tools</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($jra))
                            @foreach($jra as $data)
                        <tr>
                            <td>{{$data->kode_jenis}}</td>
                            <td>{{$data->nm_jenis_jra}}</td>
                            <td>{{$data->aktif}} thn</td>
                            <td>{{$data->inaktif}} thn</td>
                            <td>{{$data->sifat_dokumen}}</td>
                            <td>
                                <a href="#" class="on-default edit-row" data-kodejenis="{{$data->kode_jenis}}" data-id="{{$data->id}}"
                                   data-nama="{{$data->nm_jenis_jra}}" data-aktif="{{$data->aktif}}" data-inaktif="{{$data->inaktif}}" data-sifat="{{$data->sifat_dokumen}}"
                                   data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-pencil" ></i>
                                </a>
                                <a>/</a>
                                <a href="{{url('delete-jra/'.$data->id)}}" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Form JRA</h4>
                                    </div>

                                    <div class="modal-body">

                                        <form class="form-horizontal" action="{{url('edit-jra')}}" method="post">
                                            {{csrf_field()}}

                                            <input type="text" class="hidden" id="id" placeholder="PP.AP.P" name="id">

                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label>Kode Jenis</label>
                                                    <input type="text" class="form-control" id="kdjenis" placeholder="PP.AP.P" name="kdjenis" disabled>
{{--                                                    <select class="form-control select2" style="width: 100%;" name="kdjenis" required>--}}
{{--                                                        <option selected="selected" >Select...</option>--}}
{{--                                                        <option value="{{$jenis->no_takah}}">{{$jenis->kode_jenis}}/ {{$jenis->nama_jenis}}</option>--}}
{{--                                                        @if(!empty($jenisDoc))--}}
{{--                                                            @foreach($jenisDoc as $jenis)--}}
{{--                                                                <option value="{{$jenis->no_takah}}">{{$jenis->kode_jenis}}/ {{$jenis->nama_jenis}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        @else--}}
{{--                                                        @endif--}}
{{--                                                    </select>--}}

                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Jenis</label>
                                                    <input type="text" class="form-control" id="nama" placeholder="PP.AP.P" name="nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Aktif</label>
                                                    <input type="number" class="form-control" id="aktif" placeholder="PP.AP.P" name="aktif" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Inaktif</label>
                                                    <input type="number" class="form-control" id="inaktif" placeholder="PP.AP.P" name="inaktif" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Sifat Dokumen</label>
                                                    <select class="form-control select2" style="width: 100%;" name="sifat" id="sifat">
                                                        <option value="Permanen">Permanen</option>
                                                        <option value="Musnah">Musnah</option>
                                                        <option value="Ditinjau Ulang">Ditinjau Ulang</option>
                                                    </select>
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
                        @endforeach
                        @endif


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No Takah</th>
                            <th>nama Jenis</th>
                            <th>aktif</th>
                            <th>inaktif</th>
                            <th>sifat</th>
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
        var kodejenis = button.data('kodejenis') // Extract info from data-* attributes
        var namajenis = button.data('nama') // Extract info from data-* attributes
        var aktif = button.data('aktif') // Extract info from data-* attributes
        var inaktif = button.data('inaktif') // Extract info from data-* attributes
        var sifat = button.data('sifat') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        console.log(id)
        console.log(kodejenis)
        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #kdjenis').val(kodejenis)
        modal.find('.modal-body #nama').val(namajenis)
        modal.find('.modal-body #aktif').val(aktif)
        modal.find('.modal-body #inaktif').val(inaktif)
        modal.find('.modal-body #sifat').val(sifat)
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

<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>
</body>
</html>
