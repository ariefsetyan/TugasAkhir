<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
////        $aktif = DB::table('dokumens')->where([
////            ['kurun_waktu','=','2019'],['status','=','aktif']
////        ])->count();
////        $inaktif = DB::table('dokumens')->where([['kurun_waktu','=','2019'],['status','=','inaktif']])->count();
//        $thun = Peminjaman::all();
        $now = date('Y-m-d');
        $pecah = explode('-', $now);
        $tahun = $pecah[0];
        $bulan = $pecah[1];
        $tgl = $pecah[2];
        $bln = date('M, 2019-01-01' );
//
//        $bulan1 = $pecah[1]-1;
//        $bulan2 = $pecah[1]-2;
//        $bulan3 = $pecah[1]-3;
//
//        $periode1 = date($tahun.'-'.$bulan1.'-'.$tgl);
//        $periode2 = date($tahun.'-'.$bulan2.'-'.$tgl);
//        $periode3 = date($tahun.'-'.$bulan3.'-'.$tgl);

        $pinjamdJan =DB::table('peminjamen')->where([['bulan','=','Jan'],['tahun','=',$tahun]])->count();
        $pinjamnFeb =DB::table('peminjamen')->where([['bulan','=','Feb'],['tahun','=',$tahun]])->count();
        $pinjamMar =DB::table('peminjamen')->where([['bulan','=','Mar'],['tahun','=',$tahun]])->count();
        $pinjamApr =DB::table('peminjamen')->where([['bulan','=','Apr'],['tahun','=',$tahun]])->count();
        $pinjamMay =DB::table('peminjamen')->where([['bulan','=','May'],['tahun','=',$tahun]])->count();
        $pinjamJun =DB::table('peminjamen')->where([['bulan','=','Jun'],['tahun','=',$tahun]])->count();
        $pinjamJul =DB::table('peminjamen')->where([['bulan','=','Jul'],['tahun','=',$tahun]])->count();
        $pinjamAug =DB::table('peminjamen')->where([['bulan','=','Aug'],['tahun','=',$tahun]])->count();
        $pinjamSep =DB::table('peminjamen')->where([['bulan','=','Sep'],['tahun','=',$tahun]])->count();
        $pinjamOct =DB::table('peminjamen')->where([['bulan','=','Oct'],['tahun','=',$tahun]])->count();
        $pinjamNov =DB::table('peminjamen')->where([['bulan','=','Nov'],['tahun','=',$tahun]])->count();
        $pinjamDec =DB::table('peminjamen')->where([['bulan','=','Dec'],['tahun','=',$tahun]])->count();
//        dd($tahun);



        $top5 = DB::table('peminjamen as p')
            ->select(DB::raw('COUNT(*) as y'),'d.nama_dokumen as label')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
//            ->where('d.kondisi_dokumen','=',3)
            ->whereIn('d.kondisi_dokumen', [0,1,2])
            ->groupBy('p.id_dokumen')
            ->orderBy('p.id_dokumen')
            ->limit(4)
            ->get();
        $top=json_encode($top5,JSON_NUMERIC_CHECK);
//        dd($top5);
        $detil = DB::table('peminjamen as p')
//            ->select(DB::raw('COUNT(*) as y'),'d.nama_dokumen as label')
            ->select(DB::raw('COUNT(*) as total'),'d.nama_dokumen', 'jd.kode_jenis')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
//            ->where('d.kondisi_dokumen','=',3)
            ->whereIn('d.kondisi_dokumen', [0,1,2])
            ->groupBy('p.id_dokumen')
            ->orderBy('p.id_dokumen')
            ->limit(4)
            ->get();

//        $topjenis = DB::table('peminjamen as p')
//            ->select(DB::raw('COUNT(*) as y'),'jd.kode_jenis as label')
////            ->select(DB::raw('COUNT(*) as total'),'d.nama_dokumen', 'jd.kode_jenis')
//            ->join('dokumens as d','p.id_dokumen','=','d.id')
//            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
////            ->where('KP.00.06','=','')
//            ->whereIn('d.kondisi_dokumen', [0,1,2])
////            ->groupBy('p.id_dokumen')
//            ->groupBy('jd.kode_jenis')
//            ->orderBy('p.id_dokumen')
//            ->limit(3)
//            ->get();
//        $topjs=json_encode($top5,JSON_NUMERIC_CHECK);
////        dd($topjenis);
//


        return view('dashboard',compact('jumlahDokumen','jumDokumenAktif','jumDokumenIn','jumDokumenMusnah','jumlahUser','jumPinjam',
            'pinjamdJan','pinjamnFeb','pinjamMar','pinjamApr','pinjamMay','pinjamJun','pinjamJul','pinjamAug','pinjamSep','pinjamOct','pinjamNov','pinjamDec',
            'tahun','top','detil'));
    }

    public function seringdiPinjam(){
        $top5 = DB::table('peminjamen as p')
            ->select('d.kondisi_dokumen','jd.kode_jenis','d.no_takah','d.nama_dokumen',DB::raw('COUNT(*) as jumlah'))
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
//            ->where('d.kondisi_dokumen','=',3)
            ->whereIn('d.kondisi_dokumen', [0,1,2])
            ->groupBy('p.id_dokumen')
            ->orderBy('p.id_dokumen')
            ->limit(3)
            ->get();

//        $top5 = DB::table('peminjamen as p')
//            ->select('d.nama_dokumen',DB::raw('COUNT(*) as jumlah'))
//            ->join('dokumens as d','p.id_dokumen','=','d.id')
//            ->groupBy('p.id_dokumen')
//            ->orderBy('p.id_dokumen')
//            ->limit(3)
//            ->get();
        dd($top5);
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
