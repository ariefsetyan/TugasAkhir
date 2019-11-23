
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
                Page Form Edit

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{url('daftar-penyimpanan')}}">Daftar Dokumen</a></li>
                <li class="active">Page Form Edit</li>
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
                            <h3 class="box-title">Form Dokumen</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('update-dokumen')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                @foreach($dokumen as $data)
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="form-group">
                                    <label>Kode Dokumen</label>
                                    <select class="form-control select2 dynamic" style="width: 100%;" data-dependent="jenis" id="kode" name="kode" disabled>
                                        <option selected="selected" value="{{$data->no_takah}}">{{$data->kode_jenis}}/{{$data->nama_jenis}}</option>
{{--                                        @if(!empty($nomerdoc))--}}
{{--                                            @foreach($nomerdoc as $datano)--}}
{{--                                                                                        @foreach($nomerdoc as $key=>$value)--}}
{{--                                                <option value="{{$datano->no_takah}}">{{$datano->kode_jenis}}/{{$datano->nama_jenis}}</option>--}}
{{--                                                                                                <option value="{{$key}}">{{$value}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        @endif--}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Dokumen</label>
                                    <select class="form-control select2 dynamic" style="width: 100%;" data-dependent="jenis" name="jenis" id="kode" disabled>
                                        <option selected="selected">{{$data->nm_jenis_jra}}</option>
{{--                                        @foreach($jenis_jra as $jenisJra)--}}
{{--                                            <option value="{{$jenisJra->id}}">{{$jenisJra->nm_jenis_jra}}</option>--}}
{{--                                        @endforeach--}}

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="deskripsi" required>{{$data->diskripsi}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kurun Waktu</label>
                                    <select class="form-control select2" style="width: 100%;" name="tahun" required>
                                            <option selected="selected">{{$data->kurun_waktu}}</option>
                                        {{$thn_skr = date('Y')}}
                                        @for ($i = 1870; $i <= $thn_skr; $i++)
                                            <option>{{$i}}</option>
                                        @endfor

                                    </select>
                                    {{--                                    <input type="date" class="form-control" id="kurunWaktu" name="kurunWaktu" placeholder="tahun">--}}
                                </div>
                                <div class="form-group">
                                    <label>Tingkat perkembangan</label>
                                    <select class="form-control select2" style="width: 100%;" name="tPerkembangan" required>
                                        <option selected="selected">{{$data->tingkat_perkembangan}}</option>
                                        <option >Asli</option>
                                        <option>Copy</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Media Arsip</label>
                                    <select class="form-control select2" style="width: 100%;" name="media" required>
                                        <option>{{$data->media_arsip}}</option>
                                        <option selected="selected">Kertas</option>
                                        <option>Asli</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <input type="text" class="form-control" id="nama" placeholder="" name="kondisi" value="{{$data->kondisi}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File</label><br>
                                    <a>{{$data->file}}</a>

                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="file" name="file">

                                </div>
                                @endforeach
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
<script>
    $(document).ready(function () {
        $('select[name="kode"]').on('change', function () {
            var id_jra = $(this).val();
            if (id_jra){
                // console.log(id_jra);
                $.ajax({
                    url:'dynamic/'+id_jra,
                    type:'GET',
                    dataType:'json',
                    success:function (data) {
                        console.log(data.length)
                        console.log(data)
                        $('select[name="jenis"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="jenis"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                })
            }else {
                $('select[name="jenis"]').empty();
            }
        })
    })
</script>
</body>
</html>

