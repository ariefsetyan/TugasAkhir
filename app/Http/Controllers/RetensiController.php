<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RetensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
//        $tglnow=date('Y-m-d');
////        dd($tglnow);
//        $exthn = explode('-',$tglnow);
//        $thn = $exthn[0];
//        $datas = DB::table('dokumens as d')
//            ->select('d.id','tgl_upload','aktif','inaktif','sifat_dokumen')
//            ->join('j_r_a_s as jra','d.jenis_dok_jra','=','jra.id')
//            ->get();
////        dd($thn,$datas);
//        foreach ($datas as $data){
//            $tglupload = $data->tgl_upload;
//            $extglupload = explode('-',$tglupload);
//            $thnupload = $extglupload[0];
//            $inttahun = (int)$thn;
//            $intthnupload = (int)$thnupload;
//            $aktif = (int)$data->aktif;
//            $inaktif = (int)$data->inaktif;
//
//            $thnaktif = $intthnupload+$aktif;
//            $thninaktif = $intthnupload+$aktif+$inaktif;
////            var_dump($thnaktif);
////            var_dump($thninaktif);
//            if ($thnaktif  > $inttahun){
//                DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'aktif']);
//                echo 'Aktif';
//            }elseif ($thninaktif > $inttahun){
//                DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'inaktif']);
//                echo 'Inaktif';
//            }
//            elseif ($inttahun > $thninaktif){
//                if ($data->sifat_dokumen == 'Musnah'){
//                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'musnah']);
//                    echo 'Musnah';
//                }elseif ($data->sifat_dokumen == 'Ditinjau Ulang'){
//                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'ditinjau ulang']);
//                    echo 'Ditinjau Ulang';
//                }elseif ($data->sifat_dokumen == 'permanen'){
//                    DB::table('dokumens')->where('id','=',$data->id)->update(['status' => 'permanen']);
//                }
//            }
//        }
        if (session('success_message')){
            toast('Permohonan berhasil dikirim','success');
        }elseif (session('success')){
            Alert::success('Success', 'Data Berhasil Di Update');
        }
        $datas = DB::table('dokumens as d')
            ->select('d.no_takah','d.id','d.nama_dokumen','d.kurun_waktu','d.tingkat_perkembangan','d.media_arsip','d.kondisi','d.status','jd.kode_jenis')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where([['status','=','musnah'],['kondisi_dokumen','=','0']])
            ->orWhere([['status','=','ditinjau ulang'],['kondisi_dokumen','=','0']])
//            ->orWhere('kondisi_dokumen','=','null')
            ->get();
//        dd($datas);
        return view('retensi.daftar',compact('datas'));
    }
    public function update($id,Request $request){
//        dd($id,$request->status);
        $update = DB::table('dokumens')->where('id','=',$id)->update(['status' => $request->status]);
        return redirect('jadwal-retensi')->withSuccess('Successfully');
    }
    public function sent(Request $request){
        $datas = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where([['status','=','musnah'],['kondisi_dokumen','=','0']])
            ->orWhere([['status','=','ditinjau ulang'],['kondisi_dokumen','=','0']])
//            ->orWhere('kondisi_dokumen','=','null')
            ->get();
//        $jmldatas = DB::table('dokumens')
//            ->where('status','=','musnah')
//            ->orWhere('status','=','ditinjau ulang')
////            ->orWhere('')
//            ->count();

        foreach ($datas as $data){
            if ($data->status == "musnah" || $data->status == "ditinjau ulang"){
//                var_dump($data->status,$request->status);
                $update = DB::table('dokumens')->where('id','=',$data->id)->update(['kondisi_dokumen' => '1']);
            }
//        var_dump($data->status);
//            if (session('success_message')){
            //            }
        }
            return redirect('jadwal-retensi')->withSuccessMessage('Successfully');
    }
    public function daftarRetensi(){
        if (session('success')){
            toast('Data Berhasil di Exsekusi','success');
        }
        $datas = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where([['status','=','musnah'],['kondisi_dokumen','=','2']])
            ->orWhere([['status','=','ditinjau ulang'],['kondisi_dokumen','=','2']])
//            ->orWhere('kondisi_dokumen','=','null')
            ->get();
//        dd($datas)
        return view('retensi.daftarRetensi',compact('datas'));
    }
    public function eksekusi(){
        $datas = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where([['status','=','musnah'],['kondisi_dokumen','=','2']])
            ->orWhere([['status','=','ditinjau ulang'],['kondisi_dokumen','=','2']])
//            ->orWhere('kondisi_dokumen','=','null')
            ->get();
        foreach ($datas as $data){
            if ($data->status == 'musnah'){
                DB::table('dokumens')->where('id','=',$data->id)->update(['kondisi_dokumen' => '3']);
            }elseif ($data->status == 'ditinjau ulang'){
                DB::table('dokumens')->where('id','=',$data->id)->update(['kondisi_dokumen' => '0']);
            }

        }
            return back()->withSuccess('Successfully');
    }

}
