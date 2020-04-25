<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->isAdmin == 1){
            return redirect('/dashboard');
        }elseif (auth()->user()->isAdmin == 2){
            return redirect('home-kepala');
        }else{
            return redirect('form-pengajuan');

        }
    }

    public function dashboard(){
        $jumlahDokumen = DB::table('dokumens')->count();
        $jumlahUser = DB::table('users')->count();
        $jumDokumenAktif = DB::table('dokumens')->where('status','=','aktif')->count();
        $jumDokumenIn = DB::table('dokumens')->where('status','=','inaktif')->count();
        $jumDokumenMusnah = DB::table('dokumens')->where('status','=','musnah')->count();
        $jumPinjam = DB::table('peminjamen')->where('id_status','=','1')->count();
        $now = date('Y-m-d');
        $pecah = explode('-', $now);
        $tahun = $pecah[0];
        $bulan = $pecah[1];
        $tgl = $pecah[2];
        $bln = date('M, 2019-01-01' );
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
        $topjenis = DB::table('peminjamen as p')
            ->select(DB::raw('COUNT(*) as y'),'jd.kode_jenis as label','d.nama_dokumen')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->whereIn('d.kondisi_dokumen', [0,1,2])
            ->groupBy('jd.kode_jenis')
            ->orderBy('p.id_dokumen')
            ->limit(4)
            ->get();
        $datatopjenis=json_encode($topjenis,JSON_NUMERIC_CHECK);
        $detil = DB::table('peminjamen as p')
            ->select(DB::raw('COUNT(*) as total'),'d.nama_dokumen', 'jd.kode_jenis')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where('jd.kode_jenis','=','HM.01')
            ->whereIn('d.kondisi_dokumen', [0,1,2])
            ->groupBy('p.id_dokumen')
            ->orderBy('p.id_dokumen')
            ->get();
        $detil2 = DB::table('peminjamen as p')
            ->select(DB::raw('COUNT(*) as total'),'d.nama_dokumen', 'jd.kode_jenis')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where('jd.kode_jenis','=','KP.00.06')
            ->whereIn('d.kondisi_dokumen', [0,1,2])
            ->groupBy('p.id_dokumen')
            ->orderBy('p.id_dokumen')
            ->get();
        foreach ($topjenis as $tp){
            $top[] =
                array( DB::table('peminjamen as p')
                    ->select('d.nama_dokumen as nama_dokumen',DB::raw('COUNT(*) as tot'))
                    ->join('dokumens as d','p.id_dokumen','=','d.id')
                    ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
                    ->where('jd.kode_jenis','=',$tp->label)
                    ->whereIn('d.kondisi_dokumen', [0,1,2])
                    ->groupBy('p.id_dokumen')
                    ->orderBy('p.id_dokumen')
                    ->get()
        );
        }
            $topdetil=$top[0][0];

        return view('dashboard',compact('jumlahDokumen','jumDokumenAktif','jumDokumenIn','jumDokumenMusnah','jumlahUser','jumPinjam',
            'pinjamdJan','pinjamnFeb','pinjamMar','pinjamApr','pinjamMay','pinjamJun','pinjamJul','pinjamAug','pinjamSep','pinjamOct','pinjamNov','pinjamDec',
            'tahun','top','topdetil','topjenis',
            'datatopjenis','detil','detil2'));
    }


}
