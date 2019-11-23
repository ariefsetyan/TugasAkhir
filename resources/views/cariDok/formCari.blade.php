
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
{{--    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">--}}
    <!-- Select2 -->
    <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

{{--    <!-- daterange picker -->--}}
{{--    <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">--}}
{{--    <!-- bootstrap datepicker -->--}}
{{--    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">--}}
{{--    <!-- iCheck for checkboxes and radio inputs -->--}}
{{--    <link rel="stylesheet" href="../../plugins/iCheck/all.css">--}}
{{--    <!-- Bootstrap Color Picker -->--}}
{{--    <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">--}}
{{--    <!-- Bootstrap time Picker -->--}}
{{--    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">--}}

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
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Quick Example</h3>
                        </div>
                    <!-- form start -->
                    <form role="form" action="{{url('prosescari')}}">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Kode</label>
                                <select class="form-control select2" style="width: 100%;" name="kode">
                                    @foreach($kode as $kodedok)
                                        <option value="{{$kodedok->no_takah}}">{{$kodedok->kode_jenis}}/{{$kodedok->nama_jenis}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Surat</label>
                                <input type="text" class="form-control" id="surat" placeholder="" name="surat">
                            </div>

                            <div class="form-group">
                                <label>Tahun</label>
                                <select class="form-control select2" style="width: 100%;" name="tahun">
                                    <option value="">Select...</option>;
                                    {{$thnsekarang=date('Y')}}
                                    @for ($i=1977;$i<=$thnsekarang;$i++)
                                        <option value="{{$i}}">{{$i}}</option>;
                                    @endfor
                                </select>
{{--                                <input type="text" class="form-control" id="tahun" placeholder="" name="tahun">--}}
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    </div>

                </div>

            </div>
            <!-- /.box -->

{{--            <div class="box">--}}
{{--                <div class="box-header">--}}
{{--                    <h3 class="box-title">Data Table With Full Features</h3>--}}
{{--                </div>--}}
{{--                <!-- /.box-header -->--}}
{{--                <div class="box-body">--}}
{{--                    <table id="example1" class="table table-bordered table-striped">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>No Takah</th>--}}
{{--                            <th>Kode Jenis</th>--}}
{{--                            <th>Nama Jenis</th>--}}
{{--                            <th>Tools</th>--}}

{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <td>Trident</td>--}}
{{--                            <td>Internet--}}
{{--                                Explorer 4.0--}}
{{--                            </td>--}}
{{--                            <td>Win 95+</td>--}}
{{--                            <td> 4</td>--}}

{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Trident</td>--}}
{{--                            <td>Internet--}}
{{--                                Explorer 5.0--}}
{{--                            </td>--}}
{{--                            <td>Win 95+</td>--}}
{{--                            <td>5</td>--}}

{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Trident</td>--}}
{{--                            <td>Internet--}}
{{--                                Explorer 5.5--}}
{{--                            </td>--}}
{{--                            <td>Win 95+</td>--}}
{{--                            <td>5.5</td>--}}

{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Trident</td>--}}
{{--                            <td>Internet--}}
{{--                                Explorer 6--}}
{{--                            </td>--}}
{{--                            <td>Win 98+</td>--}}
{{--                            <td>6</td>--}}

{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Trident</td>--}}
{{--                            <td>Internet Explorer 7</td>--}}
{{--                            <td>Win XP SP2+</td>--}}
{{--                            <td>7</td>--}}

{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Trident</td>--}}
{{--                            <td>AOL browser (AOL desktop)</td>--}}
{{--                            <td>Win XP</td>--}}
{{--                            <td>6</td>--}}

{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Gecko</td>--}}
{{--                            <td>Firefox 1.0</td>--}}
{{--                            <td>Win 98+ / OSX.2+</td>--}}
{{--                            <td>1.7</td>--}}

{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Gecko</td>--}}
{{--                            <td>Firefox 1.5</td>--}}
{{--                            <td>Win 98+ / OSX.2+</td>--}}
{{--                            <td>1.8</td>--}}

{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Gecko</td>--}}
{{--                            <td>Firefox 2.0</td>--}}
{{--                            <td>Win 98+ / OSX.2+</td>--}}
{{--                            <td>1.8</td>--}}

{{--                        </tr>--}}

{{--                        </tbody>--}}
{{--                        <tfoot>--}}
{{--                        <tr>--}}
{{--                            <th>No Takah</th>--}}
{{--                            <th>Kode Jenis</th>--}}
{{--                            <th>Nama Jenis</th>--}}
{{--                            <th>Tools</th>--}}
{{--                        </tr>--}}
{{--                        </tfoot>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--                <!-- /.box-body -->--}}
{{--            </div>--}}

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@include('footer')

    <!-- Control Sidebar -->

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
{{--<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>--}}
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
{{--<script>--}}
{{--    $(function () {--}}
{{--        $('#example1').DataTable()--}}
{{--        $('#example2').DataTable({--}}
{{--            'paging'      : true,--}}
{{--            'lengthChange': false,--}}
{{--            'searching'   : false,--}}
{{--            'ordering'    : true,--}}
{{--            'info'        : true,--}}
{{--            'autoWidth'   : false--}}
{{--        })--}}
{{--    })--}}
{{--</script>--}}


<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- Page script -->
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
