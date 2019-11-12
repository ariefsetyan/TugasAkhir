<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <title>Printed document</title>

    <style type="text/css">
        @page {
            margin: 0;
        }

        body {
            /*margin: 1cm;*/
            margin-top: 3.5cm;
            margin-bottom: 1cm;
            margin-left: 1cm;
            margin-right: 1cm;
            font-family: sans-serif;
            text-align: justify;
        }

        div.header,
        div.footer {
            position: fixed;
            background: #ddd;
            width: 100%;
            border: 0px solid #888;
            overflow: hidden;
            padding: 0.1cm;
        }

        div.leftpane {
            position: fixed;
            background: #ddd;
            width: 3cm;
            height: 3cm;
            border-right: 0px solid #888;
            top: -.7cm;
            left: 0cm;
            height: 30cm;
        }

        div.header {
            top: 0cm;
            left: 0cm;
            border-bottom-width: 0px;
            height: 2cm;
        }

        div.footer {
            bottom: 0cm;
            left: 0cm;
            border-top-width: 1px;
            height: 1cm;
        }

        div.footer table {
            width: 100%;
            text-align: center;
        }

        hr {
            page-break-after: always;
            border: 0;
        }
        /**
                * Define the width, height, margins and position of the watermark.
                **/
        #watermark {
            /*position: fixed;*/
            /*bottom:   0px;*/
            /*left:     0px;*/
            /*margin-left:10cm;*/
            /*!** The width and height may change*/
            /*    according to the dimensions of your letterhead*/
            /***!*/
            /*width:    21.8cm;*/
            /*height:   28cm;*/

            /*!** Your watermark should be behind every content**!*/
            /*z-index:  -1000;*/

            position: fixed;
            top: 45%;
            width: 100%;
            text-align: center;
            font-size: 40px;
            font-family: "Times New Roman", Times, serif;
            opacity: .3;
            transform: rotate(30deg);
            transform-origin: 50% 50%;
            z-index: -1000;
        }
    </style>

</head>

<body>
 <div id="watermark">
{{--        <img src="approved.jpg" height="100%" width="100%" />--}}

     <h1>A p p r o v e</h1>

 </div>

<div class="header">
    <div style="text-align: center;" >
        <h3>DAFTAR DOKUMEN RETENSI LAPAN </h3>
        BULAN <?php
        $date = new DateTime('now');
        echo $date->format('F Y'); // Friday, 20 January 2017 22:07:15
        ?> <br/>
         Header line 3<br/>
        Header line 4<br/>
    </div>
</div>

<div class="footer">
    <div style="text-align: center;">On line footer content aligned to the right. <a href="http://fr.selfhtml.org/css/proprietes/printlayouts.htm">More info on print layouts</a></div>
</div>

{{-- <div class="leftpane">
  <div style="text-align: center;">
		<img src="LAPAN_logo_2015.svg.png" width="80" style="margin: 1cm;" />
	</div>
</div> --}}

<main>
    <table style="width:100%" border="1">
        <tr bgcolor="#ddd">
            <td style="text-align: center;">No</td>
            <td style="text-align: center;">Kode Klarifikasi</td>
            <td style="text-align: center;">Uraian</td>
            <td style="text-align: center;">Kurun Waktu</td>
            <td style="text-align: center;">Tingkat Perkembangan</td>
            <td style="text-align: center;">Media Arsip</td>
            <td style="text-align: center;">kondisi</td>
            <td>
                <table style="width:100%" border="1">
                    <caption>Lokasi Simpan</caption>
                    <tr>
                        <td style="text-align: center;" width="10%">Gedung</td>
                        <td style="text-align: center;" width="10%">Rak</td>
                        <td style="text-align: center;" width="10%">baris</td>
                        <td style="text-align: center;" width="10%">bokx</td>
                        <td style="text-align: center;" width="10%">folder</td>
                    </tr>
                </table>
            </td>
        </tr>
{{--        <tr>--}}
{{--            <td style="text-align: center;">1</td>--}}
{{--            <td style="text-align: center;">1.00.00</td>--}}
{{--            <td style="text-align: center;">Uraian</td>--}}
{{--            <td style="text-align: center;">Kurun Waktu</td>--}}
{{--            <td style="text-align: center;">Tingkat Perkembangan</td>--}}
{{--            <td style="text-align: center;">Media Arsip</td>--}}
{{--            <td style="text-align: center;">kondisi</td>--}}
{{--            <td>--}}
{{--                <table style="width:100%" border="1">--}}
{{--                    --}}{{-- <caption>Lokasi Simpan</caption> --}}
{{--                    <tr>--}}
{{--                        <td style="text-align: center;" width="10%">1</td>--}}
{{--                        <td style="text-align: center;" width="10%">1</td>--}}
{{--                        <td style="text-align: center;" width="10%">1</td>--}}
{{--                        <td style="text-align: center;" width="10%">1</td>--}}
{{--                        <td style="text-align: center;" width="10%">1</td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td style="text-align: center;">1</td>--}}
{{--            <td style="text-align: center;">1.00.00</td>--}}
{{--            <td style="text-align: center;">Uraian</td>--}}
{{--            <td style="text-align: center;">Kurun Waktu</td>--}}
{{--            <td style="text-align: center;">Tingkat Perkembangan</td>--}}
{{--            <td style="text-align: center;">Media Arsip</td>--}}
{{--            <td style="text-align: center;">kondisi</td>--}}
{{--            <td>--}}
{{--                <table style="width:100%" border="1">--}}
{{--                    --}}{{-- <caption>Lokasi Simpan</caption> --}}
{{--                    <tr>--}}
{{--                        <td style="text-align: center;" width="10%">1</td>--}}
{{--                        <td style="text-align: center;" width="10%">1</td>--}}
{{--                        <td style="text-align: center;" width="10%">1</td>--}}
{{--                        <td style="text-align: center;" width="10%">1</td>--}}
{{--                        <td style="text-align: center;" width="10%">1</td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--            </td>--}}
{{--        </tr>--}}
        <?php $no = 1?>
                @foreach($datas as $data)
                <tr>
                    <td style="text-align: center;">{{$no}}</td>
                    <td style="text-align: center;">{{$data->kode_jenis}}</td>
                    <td style="text-align: center;">{{$data->diskripsi}}</td>
                    <td style="text-align: center;">{{$data->kurun_waktu}}</td>
                    <td style="text-align: center;">{{$data->tingkat_perkembangan}}</td>
                    <td style="text-align: center;">{{$data->media_arsip}}</td>
                    <td style="text-align: center;">{{$data->status}}</td>
                    <td>
                        <table style="width:100%" border="1">
{{--                             <caption>Lokasi Simpan</caption>--}}
                            <tr>
                                <td style="text-align: center;" width="10%">{{$data->gedung}}</td>
                                <td style="text-align: center;" width="10%">{{$data->rak}}</td>
                                <td style="text-align: center;" width="10%">{{$data->baris}}</td>
                                <td style="text-align: center;" width="10%">{{$data->bok}}</td>
                                <td style="text-align: center;" width="10%">{{$data->folder}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                    <?php $no++?>
                @endforeach

        {{-- <tr>
                <td rowspan="2" style="text-align: center;">No</td>
                <td rowspan="2" style="text-align: center;">Kode Klarifikasi</td>
                <td rowspan="2" style="text-align: center;">Uraian</td>
                <td rowspan="2" style="text-align: center;">Kurun Waktu</td>
                <td rowspan="2" style="text-align: center;">Tingkat Perkembangan</td>
                <td rowspan="2" style="text-align: center;">Media Arsip</td>
                <td rowspan="2" style="text-align: center;">kondisi</td>


                            <td style="text-align: center;" width="10%">Gedung</td>
                            <td style="text-align: center;" width="10%">Rak</td>
                            <td style="text-align: center;" width="10%">baris</td>
                            <td style="text-align: center;" width="10%">bokx</td>
                            <td style="text-align: center;" width="10%">folder</td>


            </tr> --}}
    </table>


</main>

</body></html>
