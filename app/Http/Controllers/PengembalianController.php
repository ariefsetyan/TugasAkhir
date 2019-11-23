<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use App\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengembalianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            ->select('p.id','name','tgl_pinjam','tgl_kembali','nip','nama_dokumen')
            ->where([
                ['p.id_karyawan','=',$idpegawai],
                ['id_status','=','1']
            ])
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('users as u','p.id_karyawan','=','u.id')
            ->get();
//        dd($peminjaman);
        return view('pengembalian.hasilpencarian',compact('peminjaman'));
    }

    public function kembali(Request $request){

//        $datas = new Pengembalian();
//        $datas->id_peminjaman = $request->idpeminjaman;
//        $datas->id_dokumen = $request->iddokumen;
//        $datas->id_pegawai = $request->idpeminjaman;
//        $datas->save();
//        dd($datas);
        $datas = DB::table('peminjamen')->where('id','=',$request->id)
            ->update(['id_status' => 2]);
//        dd($datas);

        return redirect('daftar-pengembalian')->withSuccess('Successfully update');
    }

    public function daftar(){
        if (session('success')){
            Alert::success('Success Title', 'Success Message');
        }

        $datas = DB::table('peminjamen as p')
            ->where('id_status','2')
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->get();
//            ->join('users as u')
//        dd($datas);
        return view('pengembalian.daftar',compact('datas'));
    }
//    public function kembaliDigital(){
//
//    }
}

