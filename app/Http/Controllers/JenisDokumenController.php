<?php

namespace App\Http\Controllers;

use App\JenisDokumen;
use Illuminate\Http\Request;

class JenisDokumenController extends Controller
{
    public function FormJenisData(){
        return view('jenisDokumen.jenisDokumen');
    }
    public function Simpan(Request $request){
        $datas = new JenisDokumen();
        $datas->no_takah = $request->noTakah;
        $datas->kode_jenis = $request->kode;
        $datas->nama_jenis = $request->nama;
        $datas->save();
    }
}
