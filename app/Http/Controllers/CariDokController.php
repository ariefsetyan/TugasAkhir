<?php

namespace App\Http\Controllers;

use App\JenisDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Spatie\Dropbox\Client;
use Illuminate\Http\File;


class CariDokController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //Penyiapkan Client Disk Dropbox
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }
    public function index(){
        $kode = JenisDokumen::all();
        return view('cariDok.formCari',compact('kode'));
    }
    public function cari(Request $request){
        $kodedokumen = JenisDokumen::all();
        $kode = $request->kode;
        $surat = $request->surat;
        $tahun = $request->tahun;
        if (!empty($kode) and !empty($surat) and !empty($tahun)){
            $cari = DB::table('dokumens as d')->where([
                ['d.no_takah','=',$kode],
                ['nama_dokumen','=',$surat],
                ['kurun_waktu','=',$tahun]
            ])
                ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
//                ->join('lokasi_simpans as ls','jd.id_lokasi','=','ls.id')
                ->get();
        }elseif(!empty($kode) and !empty($tahun)){
            $cari = DB::table('dokumens as d')->where([
                ['d.no_takah','=',$kode],
                ['kurun_waktu','=',$tahun]
                ])
                ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
//                ->join('lokasi_simpans as ls','jd.id_lokasi','=','ls.id')
                ->get();
        }elseif(!empty($kode) and !empty($surat)) {
            $cari = DB::table('dokumens as d')->where([
                ['d.no_takah', '=', $kode],
                ['nama_dokumen', '=', $surat],
            ])
                ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
//                ->join('lokasi_simpans as ls','jd.id_lokasi','=','ls.id')
                ->get();
        }else{
            $cari = DB::table('dokumens as d')->where([
                ['d.no_takah', '=', $kode],
            ])
                ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
//                ->join('lokasi_simpans as ls','jd.id_lokasi','=','ls.id')
                ->get();
        }
        return view('cariDok.hasliCari',compact('cari','kodedokumen'));
//elseif (!empty($tahun)){
//            $cari = DB::table('dokumens')->where('kurun_waktu',$tahun)->get();
//        }elseif (!empty($kode) and !empty($surat) and !empty($tahun)){
//            $cari = DB::table('dokumens')->where(['kurun_waktu',$kode],
//                ['nama_dokumen',$surat])->get();
//        }
//        $lokasi = DB::table('jenis_dokumens')->where('')

    }
    public function detil($id){

        $kode = DB::table('dokumens as d')
            ->where('d.id','=',$id)
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->join('lokasi_simpans as ls','jd.id_lokasi','=','ls.id')
            ->join('j_r_a_s as j','j.id','=','d.jenis_dok_jra')
            ->get();
        $decode = json_decode($kode,true);
        $berkas = $decode[0]['file'];
        try {
//            dd($berkas);
            //menyiapkan link
            $link = $this->dropbox->listSharedLinks('public/berkas/'.$berkas);
            //membuat link untuk melihat berkas
            $raw = explode("?", $link[0]['url']);
            $gambar = $raw[0].'?raw=1';
//            dd($gambar);
            $tempGambar = tempnam(sys_get_temp_dir(), $berkas);
            copy($gambar, $tempGambar);
            //menampilkan berkas
            $file = response()->file($tempGambar);
//            dd(file($tempGambar));
//            return response()->file($tempGambar);

        } catch (Exception $e) {
            //abort jika tidak ada berkas
            return abort(404);
        }
//                dd($kode);

        return view('cariDok.detil',compact('kode','gambar'));
    }
}
