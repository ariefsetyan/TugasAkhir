<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;


//use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Crabbly\FPDF\FPDF;
use Illuminate\Support\Facades\DB;


class PDfController extends Controller
{
    public function beritaAcara(){
        $datas = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->join('lokasi_simpans as ls','jd.id_lokasi','=','ls.id')
            ->where('kondisi_dokumen','=','2')
            ->get();

        $pdf = PDF::loadView('pdf.beritaAcara',compact('datas'));
        return $pdf->download('beritaAcara.pdf');
    }
}


