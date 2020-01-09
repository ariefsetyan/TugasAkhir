<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script type="text/javascript" src="js/Chart.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('navbar.navbar')
    <!-- Left side column. contains the logo and sidebar -->
    @include('menu.menu')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$jumlahDokumen}}</h3>
                            <p>Dokumen yang Terarsip</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-folder-open-o"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$jumDokumenAktif}}</h3>

                            <p>Dokumen Aktif</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-folder-open-o"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$jumDokumenIn}}</h3>

                            <p>Dokumen Inaktif</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-folder-open-o"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{$jumDokumenMusnah}}</h3>

                            <p>Dokumen Musnah</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-folder-open-o"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <!-- small box -->--}}
{{--                    <div class="small-box bg-aqua">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>{{$jumlahUser}}</h3>--}}

{{--                            <p>Users</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-person-add"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$jumPinjam}}</h3>

                            <p>Peminjaman</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">gravik peminjaman</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        <strong>Periode: Jan, {{$tahun}} - Dec, {{$tahun}}</strong>
                                    </p>

                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="myChart"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
{{--                        <div class="box-footer">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-3 col-xs-6">--}}
{{--                                    <div class="description-block border-right">--}}
{{--                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>--}}
{{--                                        <h5 class="description-header">$35,210.43</h5>--}}
{{--                                        <span class="description-text">TOTAL REVENUE</span>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.description-block -->--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}
{{--                                <div class="col-sm-3 col-xs-6">--}}
{{--                                    <div class="description-block border-right">--}}
{{--                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>--}}
{{--                                        <h5 class="description-header">$10,390.90</h5>--}}
{{--                                        <span class="description-text">TOTAL COST</span>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.description-block -->--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}
{{--                                <div class="col-sm-3 col-xs-6">--}}
{{--                                    <div class="description-block border-right">--}}
{{--                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>--}}
{{--                                        <h5 class="description-header">$24,813.53</h5>--}}
{{--                                        <span class="description-text">TOTAL PROFIT</span>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.description-block -->--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}
{{--                                <div class="col-sm-3 col-xs-6">--}}
{{--                                    <div class="description-block">--}}
{{--                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>--}}
{{--                                        <h5 class="description-header">1200</h5>--}}
{{--                                        <span class="description-text">GOAL COMPLETIONS</span>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.description-block -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.row -->--}}
{{--                        </div>--}}
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">jenis dokumen yang sering dipinjam</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
{{--                                        {{$top}}--}}
                                    </p>

                                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                                    <div class="box-footer">
                                        <div class="row">
                                            @foreach($detil as $dt)
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="description-block border-right">
                                                    <span class="description-percentage text-green"> {{$dt->total}}</span>
                                                    <h5 class="description-header">{{substr($dt->kode_jenis,0,2)}}</h5>
                                                    <span class="description-text">{{$dt->nama_dokumen}}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            @endforeach

                                        </div>
                                        <!-- /.row -->
                                    </div>



                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
{{--                                            <div class="box-footer">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-sm-3 col-xs-6">--}}
{{--                                                        <div class="description-block border-right">--}}
{{--                                                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>--}}
{{--                                                            <h5 class="description-header">$35,210.43</h5>--}}
{{--                                                            <span class="description-text">TOTAL REVENUE</span>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- /.description-block -->--}}
{{--                                                    </div>--}}
{{--                                                    <!-- /.col -->--}}
{{--                                                    <div class="col-sm-3 col-xs-6">--}}
{{--                                                        <div class="description-block border-right">--}}
{{--                                                            <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>--}}
{{--                                                            <h5 class="description-header">$10,390.90</h5>--}}
{{--                                                            <span class="description-text">TOTAL COST</span>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- /.description-block -->--}}
{{--                                                    </div>--}}
{{--                                                    <!-- /.col -->--}}
{{--                                                    <div class="col-sm-3 col-xs-6">--}}
{{--                                                        <div class="description-block border-right">--}}
{{--                                                            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>--}}
{{--                                                            <h5 class="description-header">$24,813.53</h5>--}}
{{--                                                            <span class="description-text">TOTAL PROFIT</span>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- /.description-block -->--}}
{{--                                                    </div>--}}
{{--                                                    <!-- /.col -->--}}
{{--                                                    <div class="col-sm-3 col-xs-6">--}}
{{--                                                        <div class="description-block">--}}
{{--                                                            <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>--}}
{{--                                                            <h5 class="description-header">1200</h5>--}}
{{--                                                            <span class="description-text">GOAL COMPLETIONS</span>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- /.description-block -->--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <!-- /.row -->--}}
{{--                                            </div>--}}
                    <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->




                </div>



{{--                <div class="col-md-12">--}}
{{--                    <div class="box">--}}
{{--                        <div class="box-header with-border">--}}
{{--                            <h3 class="box-title">dokumen yang sering dipinjam</h3>--}}
{{--                        </div>--}}
{{--                        <!-- /.box-header -->--}}
{{--                        <div class="box-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="col-md-3 col-md-offset-4">--}}
{{--                                        <form role="form" action="aaaa">--}}
{{--                                            <div class="input-group input-group-sm">--}}
{{--                                                <input type="text" class="form-control">--}}
{{--                                                <span class="input-group-btn">--}}
{{--                                                <button type="submit" class="btn btn-info btn-flat">Go!</button>--}}
{{--                                            </span>--}}
{{--                                            </div>--}}

{{--                                        </form>--}}
{{--                                    </div>--}}

{{--                                    <div id="chartContaine" style="height: 370px; width: 100%;"></div>--}}

{{--                                    <div class="box-footer">--}}
{{--                                        <div class="row">--}}
{{--                                            --}}{{--                                            @foreach($detil as $dt)--}}
{{--                                            --}}{{--                                            <div class="col-sm-3 col-xs-6">--}}
{{--                                            --}}{{--                                                <div class="description-block border-right">--}}
{{--                                            --}}{{--                                                    <span class="description-percentage text-green"> {{$dt->total}}</span>--}}
{{--                                            --}}{{--                                                    <h5 class="description-header">{{substr($dt->kode_jenis,0,2)}}</h5>--}}
{{--                                            --}}{{--                                                    <span class="description-text">{{$dt->nama_dokumen}}</span>--}}
{{--                                            --}}{{--                                                </div>--}}
{{--                                            --}}{{--                                                <!-- /.description-block -->--}}
{{--                                            --}}{{--                                            </div>--}}
{{--                                            --}}{{--                                            @endforeach--}}

{{--                                        </div>--}}
{{--                                        <!-- /.row -->--}}
{{--                                    </div>--}}



{{--                                    <!-- /.chart-responsive -->--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}

{{--                                <!-- /.col -->--}}
{{--                            </div>--}}
{{--                            <!-- /.row -->--}}
{{--                        </div>--}}
{{--                        <!-- ./box-body -->--}}
{{--                    --}}{{--                        <div class="box-footer">--}}
{{--                    --}}{{--                            <div class="row">--}}
{{--                    --}}{{--                                <div class="col-sm-3 col-xs-6">--}}
{{--                    --}}{{--                                    <div class="description-block border-right">--}}
{{--                    --}}{{--                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>--}}
{{--                    --}}{{--                                        <h5 class="description-header">$35,210.43</h5>--}}
{{--                    --}}{{--                                        <span class="description-text">TOTAL REVENUE</span>--}}
{{--                    --}}{{--                                    </div>--}}
{{--                    --}}{{--                                    <!-- /.description-block -->--}}
{{--                    --}}{{--                                </div>--}}
{{--                    --}}{{--                                <!-- /.col -->--}}
{{--                    --}}{{--                                <div class="col-sm-3 col-xs-6">--}}
{{--                    --}}{{--                                    <div class="description-block border-right">--}}
{{--                    --}}{{--                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>--}}
{{--                    --}}{{--                                        <h5 class="description-header">$10,390.90</h5>--}}
{{--                    --}}{{--                                        <span class="description-text">TOTAL COST</span>--}}
{{--                    --}}{{--                                    </div>--}}
{{--                    --}}{{--                                    <!-- /.description-block -->--}}
{{--                    --}}{{--                                </div>--}}
{{--                    --}}{{--                                <!-- /.col -->--}}
{{--                    --}}{{--                                <div class="col-sm-3 col-xs-6">--}}
{{--                    --}}{{--                                    <div class="description-block border-right">--}}
{{--                    --}}{{--                                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>--}}
{{--                    --}}{{--                                        <h5 class="description-header">$24,813.53</h5>--}}
{{--                    --}}{{--                                        <span class="description-text">TOTAL PROFIT</span>--}}
{{--                    --}}{{--                                    </div>--}}
{{--                    --}}{{--                                    <!-- /.description-block -->--}}
{{--                    --}}{{--                                </div>--}}
{{--                    --}}{{--                                <!-- /.col -->--}}
{{--                    --}}{{--                                <div class="col-sm-3 col-xs-6">--}}
{{--                    --}}{{--                                    <div class="description-block">--}}
{{--                    --}}{{--                                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>--}}
{{--                    --}}{{--                                        <h5 class="description-header">1200</h5>--}}
{{--                    --}}{{--                                        <span class="description-text">GOAL COMPLETIONS</span>--}}
{{--                    --}}{{--                                    </div>--}}
{{--                    --}}{{--                                    <!-- /.description-block -->--}}
{{--                    --}}{{--                                </div>--}}
{{--                    --}}{{--                            </div>--}}
{{--                    --}}{{--                            <!-- /.row -->--}}
{{--                    --}}{{--                        </div>--}}
{{--                    <!-- /.box-footer -->--}}
{{--                    </div>--}}
{{--                    <!-- /.box -->--}}




{{--                </div>--}}




            </div>
            <!-- /.box-footer -->

            <!-- Main row -->

            <!-- /.row (main row) -->

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
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
            datasets: [{
                label: '',
                data: [{{$pinjamdJan}}, {{$pinjamnFeb}}, {{$pinjamMar}}, {{$pinjamApr}}, {{$pinjamMay}}, {{$pinjamJun}},
                    {{$pinjamJul}}, {{$pinjamAug}}, {{$pinjamSep}}, {{$pinjamOct}}, {{$pinjamNov}}, {{$pinjamDec}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title:{
                // text: "Revenue Chart of Acme Corporation"
            },
            axisY: {
                // title: "Revenue (in USD)",
                // prefix: "$",
                // suffix:  "k"
            },
            data: [{
                type: "bar",
                // yValueFormatString: "$#,##0K",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontWeight: "bolder",
                indexLabelFontColor: "white",
                dataPoints: <?php echo $top ?>
            }]
        });
        chart.render();

        {{--var chart = new CanvasJS.Chart("chartContaine", {--}}
        {{--    animationEnabled: true,--}}
        {{--    theme: "light2",--}}
        {{--    title:{--}}
        {{--        text: "Gold Reserves"--}}
        {{--    },--}}
        {{--    axisY: {--}}
        {{--        title: "Gold Reserves (in tonnes)"--}}
        {{--    },--}}
        {{--    data: [{--}}
        {{--        type: "column",--}}
        {{--        yValueFormatString: "#,##0.## tonnes",--}}
        {{--        dataPoints: --}}
        {{--    }]--}}
        {{--});--}}
        {{--chart.render();--}}
    }
</script>

</body>
</html>
