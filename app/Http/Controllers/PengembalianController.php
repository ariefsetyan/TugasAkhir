<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function index(){
        return view('pengembalian/pengembalian');
    }
    public function cari(Request $request){
        $userpeminjama = DB::table('users')
            ->where('nip',$request->cari)
            ->orWhere('name','like','%'.$request->cari.'%')
            ->get();
        $decode = json_decode($userpeminjama,true);
        $idpegawai = $decode[0]['id'];
        $peminjaman = DB::table('peminjamen as p')
            ->where('p.id_karyawan','=',$idpegawai)
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('users as u','p.id_karyawan','=','u.id')
            ->get();
//        dd($peminjaman);
        return view('pengembalian.hasilpencarian',compact('peminjaman'));
    }
    public function daftar(){
        return view('pengembalian.daftar');
    }
}

