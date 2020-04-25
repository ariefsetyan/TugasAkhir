<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class RetensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    public function index(){
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
            ->get();
        return view('retensi.daftar',compact('datas'));
    }
    public function update($id,Request $request){
        $update = DB::table('dokumens')->where('id','=',$id)->update(['status' => $request->status]);
        return redirect('jadwal-retensi')->withSuccess('Successfully');
    }
    public function sent(Request $request){
        $datas = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where([['status','=','musnah'],['kondisi_dokumen','=','0']])
            ->orWhere([['status','=','ditinjau ulang'],['kondisi_dokumen','=','0']])
            ->get();

        foreach ($datas as $data){
            if ($data->status == "musnah" || $data->status == "ditinjau ulang"){
                $update = DB::table('dokumens')->where('id','=',$data->id)->update(['kondisi_dokumen' => '1']);
            }
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
            ->get();
        return view('retensi.daftarRetensi',compact('datas'));
    }
    public function eksekusi(){
        $datas = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where([['status','=','musnah'],['kondisi_dokumen','=','2']])
            ->orWhere([['status','=','ditinjau ulang'],['kondisi_dokumen','=','2']])
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
    public function view($id){
        $dokumen = DB::table('dokumens as d')
            ->select('nama_dokumen','diskripsi','kurun_waktu','tingkat_perkembangan','media_arsip','kondisi','file','d.id',
                'jd.kode_jenis','jd.nama_jenis',
                'j.aktif','j.inaktif','j.sifat_dokumen','j.nm_jenis_jra',
                'gedung','rak','baris','bok','folder'
            )

            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->join('j_r_a_s as j','j.id','=','d.jenis_dok_jra')
            ->join('lokasi_simpans as ls','jd.id_lokasi','=','ls.id')
            ->where('d.id','=',$id)->get();
        $decode = json_decode($dokumen,true);
        $berkas = $decode[0]['file'];

        try {
            $link = $this->dropbox->listSharedLinks('public/berkas/'.$berkas);
            $raw = explode("?", $link[0]['url']);
            $gambar = $raw[0].'?raw=1';
            $tempGambar = tempnam(sys_get_temp_dir(), $berkas);
            copy($gambar, $tempGambar);
            $file = response()->file($tempGambar);

        } catch (Exception $e) {
            return abort(404);
        }
        return view('retensi.viewDokumen',compact('dokumen','file','gambar'));
    }


}
