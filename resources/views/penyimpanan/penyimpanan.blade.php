
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
                Page Simpan Dokumen
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
{{--                <li><a href="#">Examples</a></li>--}}
                <li class="active">Simpan dokumen</li>
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
                            <h3 class="box-title">From Dokumen</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{url('simpan-dokumen')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>jenis dokumen</label>
                                    <select class="form-control select2 dynamic" style="width: 100%;" data-dependent="jenis" id="kode" name="kode" required>
                                        <option selected="selected">select ...</option>
{{--                                        <option selected="selected">perancangan</option>--}}
                                        @if(!empty($nomerdoc))
                                        @foreach($nomerdoc as $datano)
{{--                                        <option value="{{$datano->no_takah}}">{{$datano->kode_jenis}}/{{$datano->nama_jenis}}</option>--}}
                                        <option value="{{$datano->nama_jenis}}">{{$datano->nama_jenis}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>anak persoalan</label>
{{--                                    <select class="form-control select2 dynamic" style="width: 100%;" data-dependent="jenis" name="jenis" id="kode" required>--}}
                                    <select class="form-control select2 dynamic" style="width: 100%;" data-dependent="jenis" name="jenis" id="kd" required>
                                        <option selected="selected">Select ...</option>
{{--                                        <option selected="selected">PENYUSUNAN RENCANA PROGRAM DAN KINERJA</option>--}}

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>perihal</label>
                                    <select class="form-control select2 dynamic" style="width: 100%;" data-dependent="perihal" name="perihal" id="perihal">
                                        <option selected="selected">Select ...</option>
{{--                                        <option selected="selected">PENYUSUNAN RENCANA PROGRAM DAN KINERJA</option>--}}

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jenis JRA</label>
                                        <select class="form-control select2 dynamic" style="width: 100%;" data-dependent="jenisJra" name="jenisJra" required>
{{--                                    <select class="form-control select2 dynamic" style="width: 100%;" data-dependent="jenis" name="jenis" id="kd" required>--}}
                                        <option selected="selected">Select ...</option>
                                        {{--                                        <option selected="selected">PENYUSUNAN RENCANA PROGRAM DAN KINERJA</option>--}}

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Dokumen</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="deskripsi" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kurun Waktu</label>
{{--                                    <select class="form-control select2" style="width: 100%;" name="tahun">--}}
{{--                                        {{$thn_skr = date('Y')}}--}}
{{--                                        @for ($i = 1870; $i <= $thn_skr; $i++)--}}
{{--                                            <option selected="selected">{{$i}}</option>--}}
{{--                                        @endfor--}}

{{--                                    </select>--}}
                                    <input type="date" class="form-control" id="kurunWaktu" name="kurunWaktu" placeholder="tahun" required>
                                </div>
                                <div class="form-group">
                                    <label>Tingkat perkembangan</label>
                                    <select class="form-control select2" style="width: 100%;" name="tPerkembangan">
                                        <option selected="selected">Asli</option>
                                        <option>Copy</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Media Arsip</label>
                                    <select class="form-control select2" style="width: 100%;" name="media">
                                        <option selected="selected">Kertas</option>
                                        <option>Asli</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <input type="text" class="form-control" id="nama" placeholder="" name="kondisi" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="file" name="file" required>

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

{{--@include('sweetalert::alert')--}}

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
{{--an p--}}
<script>
    var setter;
    $(document).ready(function () {
        $('select[name="kode"]').on('change', function () {
            var id_pp = $(this).val();
            var tgl_retensi = $(this).data('')
            if (id_pp){
                // console.log(id_pp);
                console.log("data : kode 1");
                $.ajax({
                    url:'dynamic/'+id_pp,
                    type:'GET',
                    dataType:'json',
                    success:function (data) {
                        // console.log(data.length)
                        console.log(data)
                        $('select[name="jenis"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="jenis"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                    }
                })
            }else {
                console.log("masuk kode 2");
                $('select[name="jenis"]').empty();
            }
        })
    })
</script>
{{--p--}}
<script>
    // var deter = false;
    $(document).ready(function () {
        $('select[name="jenis"]').on('change', function () {
            var id_ap = $(this).val();
            var tgl_retensi = $(this).data('')
            console.log(id_ap)
            if (id_ap){
                // console.log(id_jra);
                console.log("masuk jenis 1");
                window.deter = true;
                $.ajax({
                    url:'dynamicp/'+id_ap,
                    type:'GET',
                    dataType:'json',
                    success:function (data) {
                        console.log(data.length)
                        console.log(data)
                        $('select[name="perihal"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="perihal"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                })
            }
            if(deter && id_ap !== "null"){
                // console.log("mantup")
                $(document).ready(function () {
                    $('select[name="jenis"]').on('change', function () {
                        var id_jra = $(this).val();
                        // var id_jrak = $(this).key();
                        var tgl_retensi = $(this).data('')
                        console.log('id '+id_jra);

                        if (id_jra){
                            // console.log(id_jra);
                            console.log("masuk periihal 1");
                            $.ajax({
                                url:'dynamicjra2/'+id_jra,
                                type:'GET',
                                dataType:'json',
                                success:function (data) {
                                    // console.log(data.length)
                                    console.log(data)
                                    $('select[name="jenisJra"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="jenisJra"]').append('<option value="'+ key +'">'+ value +'</option>');
                                    });
                                }
                            })
                        }else {
                            console.log("masuk perihal 2");
                            $('select[name="jenisJra"]').empty();
                        }
                    })
                })
            }
        })
    })

</script>
{{--jra--}}
<script>
    $(document).ready(function () {
        $('select[name="perihal"]').on('change', function () {
            var id_jra = $(this).val();
            var tgl_retensi = $(this).data('')
            console.log(id_jra);

            if (id_jra){
                // console.log(id_jra);
                console.log("masuk periihal 1");
                $.ajax({
                    url:'dynamicjra/'+id_jra,
                    type:'GET',
                    dataType:'json',
                    success:function (data) {
                        // console.log(data.length)
                        console.log(data)
                        $('select[name="jenisJra"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="jenisJra"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                })
            }else {
                console.log("masuk perihal 2");
                $('select[name="jenisJra"]').empty();
            }
        })
    })
</script>
</body>
</html>

