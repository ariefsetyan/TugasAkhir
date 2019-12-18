<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->isAdmin == 1){
            return redirect('/dashboard');
        }elseif (auth()->user()->isAdmin == 2){
            return redirect('home-kepala');
        }else{
            return redirect('form-pengajuan');
//            return view('karyawan.home');
        }
    }

    public function dashboard(){
        $jumlahDokumen = DB::table('dokumens')->count();
        $jumlahUser = DB::table('users')->count();
        $jumDokumenAktif = DB::table('dokumens')->where('status','=','aktif')->count();
        $jumDokumenIn = DB::table('dokumens')->where('status','=','inaktif')->count();
        $jumDokumenMusnah = DB::table('dokumens')->where('status','=','musnah')->count();
        $jumPinjam = DB::table('peminjamen')->where('id_status','=','1')->count();
//        dd($jumPinjam);
        return view('dashboard',compact('jumlahDokumen','jumDokumenAktif','jumDokumenIn','jumDokumenMusnah','jumlahUser','jumPinjam'));
    }

    public function coba(){
        $tglnow=date('Y-m-d');
        $exthn = explode('-',$tglnow);
        $thn = $exthn[0];
        $datas = DB::table('dokumens as d')
            ->select('d.id','tgl_upload','aktif','inaktif','sifat_dokumen')
            ->join('j_r_a_s as jra','d.jenis_dok_jra','=','jra.id')
            ->get();
//        dd($thn,$datas);
        foreach ($datas as $data){
            $tglupload = $data->tgl_upload;
            $extglupload = explode('-',$tglupload);
            $thnupload = $extglupload[0];
            $inttahun = (int)$thn;
            $intthnupload = (int)$thnupload;
            $aktif = (int)$data->aktif;
            $inaktif = (int)$data->inaktif;

            $thnaktif = $intthnupload+$aktif;
            $thninaktif = $intthnupload+$aktif+$inaktif;
//            dd($thnaktif);
//            dd($thninaktif);
            if ($thnaktif  > $inttahun){
//                DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'aktif']);
                var_dump( 'Aktif');
            }elseif ($thninaktif > $inttahun){
                DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'inaktif']);
                var_dump( 'Inaktif');
            }
//            elseif ($inttahun > $thninaktif){
            else{
//                var_dump('tes');
                if ($data->sifat_dokumen == 'Musnah'){
                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'musnah']);
//                    var_dump( 'Musnah');
                }elseif ($data->sifat_dokumen == 'Ditinjau Ulang'){
                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'ditinjau ulang']);
//                    var_dump( 'Ditinjau Ulang');
                }elseif ($data->sifat_dokumen == 'permanen'){
                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'permanen']);
                }
            }
        }
    }
}
