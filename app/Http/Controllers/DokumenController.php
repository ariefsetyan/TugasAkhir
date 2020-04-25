<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\JenisDokumen;
use App\JRA;
use App\LokasiSimpan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use RealRashid\SweetAlert\Facades\Alert;

use Spatie\Dropbox\Client;
use Illuminate\Http\File;


class DokumenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    public function index()
    {
        $nomerdoc = DB::table('jenis_dokumens as jd')
        ->groupBy('nama_jenis')
        ->get();

        return view('penyimpanan.penyimpanan',compact('nomerdoc'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        Alert::success('Success', 'data berhasil disimpan');

        $waktu = $request->kurunWaktu;
        $kurunwaktu = explode('-',$waktu);

        $data = request()->validate([
            'file' => 'required|mimes:pdf|max:10000',
        ]);


        $berkas = $data['file'];
        $namaBerkas = uniqid().'.'.$berkas->getClientOriginalExtension();
        $berkas->storeAs('/public/berkas/', $namaBerkas, 'dropbox');
        $response = $this->dropbox->createSharedLinkWithSettings('/public/berkas/'.$namaBerkas);

        $dokumen = new Dokumen();
        $dokumen->nama_dokumen = $request->nama;
        $dokumen->diskripsi = $request->deskripsi;
        $dokumen->kurun_waktu = $kurunwaktu[0];
        $dokumen->tingkat_perkembangan = $request->tPerkembangan;
        $dokumen->media_arsip = $request->media;
        $dokumen->kondisi = $request->kondisi;
        $dokumen->file = $namaBerkas;
        $dokumen->no_takah = $request->perihal;
        $dokumen->jenis_dok_jra = $request->jenisJra;
        $dokumen->tgl_upload = $waktu;
        $dokumen->kondisi_dokumen = '0';
        $dokumen->save();

        $lokasiSimpan = DB::table('lokasi_simpans as ls')
            ->select('jd.kode_jenis','gedung','rak','baris','bok','folder')
            ->join('jenis_dokumens as jd','ls.id','=','jd.id_lokasi')
            ->where('no_takah','=',$request->perihal)
            ->get();

        return view('penyimpanan.tampilLokasiSimpan',compact('lokasiSimpan'));

    }

    public function show($id_pp)
    {
        $jra = JenisDokumen::where('nama_jenis','=',$id_pp)->groupBy('anak_pokok')->pluck('anak_pokok','no_takah');
        return json_encode($jra);
    }
    public function showperihal($id_ap){
        $perihal = JenisDokumen::where('anak_pokok','=',$id_ap)->pluck('perihal','no_takah');
        return json_encode($perihal);
    }
    public function jjra($id_jra){
        $jra = JRA::where('kode_jenis','=',$id_jra)->pluck('nm_jenis_jra','id');
        return json_encode($jra);
    }
    public function jjra2($id_jra){
        $no_takah = JenisDokumen::where('anak_pokok','=',$id_jra)->first();
        $nTakah = json_decode($no_takah,true);
        $noTalah=$nTakah['no_takah'];
        $jra = JRA::where('kode_jenis','=',$noTalah)->pluck('nm_jenis_jra','id');
        return json_encode($jra);
    }

    public function edit($id)
    {
        $dokumen = DB::table('dokumens as d')->select(
            'd.id','d.nama_dokumen','diskripsi','kurun_waktu','tingkat_perkembangan','media_arsip','kondisi',
            'd.no_takah','jd.kode_jenis','jd.nama_jenis','j.nm_jenis_jra','file'
        )
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->join('j_r_a_s as j','j.id','=','d.jenis_dok_jra')
            ->where('d.id','=',$id)->get();
        $nomerdoc = JenisDokumen::all();
        $jenis_jra = JRA::all();
        return view('penyimpanan.formedit',compact('dokumen','jenis_jra','nomerdoc'));
    }


    public function update(Request $request)
    {
        $id = $request->id;

        if(empty($request->file)){
            $dokumen = Dokumen::find($id)->update([
                'nama_dokumen'=>$request->nama,
                'diskripsi'=>$request->deskripsi,
                'kurun_waktu'=>$request->tahun,
                'tingkat_perkembangan'=>$request->tPerkembangan,
                'media_arsip'=>$request->media,
                'kondisi'=>$request->kondisi,

            ]);
        }else{
            $data = request()->validate([
                'file' => 'required|mimes:pdf|max:10000',
            ]);

            $berkas = $data['file'];
            $namaBerkas = uniqid().'.'.$berkas->getClientOriginalExtension();
            $berkas->storeAs('/public/berkas/', $namaBerkas, 'dropbox');
            $response = $this->dropbox->createSharedLinkWithSettings('/public/berkas/'.$namaBerkas);
            $dokumen = Dokumen::find($id)->update([
                'nama_dokumen'=>$request->nama,
                'diskripsi'=>$request->deskripsi,
                'kurun_waktu'=>$request->tahun,
                'tingkat_perkembangan'=>$request->tPerkembangan,
                'media_arsip'=>$request->media,
                'kondisi'=>$request->kondisi,
                'file'=>$namaBerkas,
            ]);
        }

        return redirect('daftar-penyimpanan')->withSuccess('Successfully update');

    }

    public function detil($id)
    {
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

        return view('penyimpanan.detilPenyimpanan',compact('dokumen','file','gambar'));
    }

    public function daftar(){
        if (session('success')){
            Alert::success('Success', 'data berhasil diperbaruhi');
        }elseif (session('success1')){
            Alert::success('Success', 'data berhasil dihapus');
        }

        $dokumen = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','jd.no_takah','=','d.no_takah')
            ->get();
        return view('penyimpanan.daftarPenyimpanan',compact('dokumen'));
    }

    public function delete($id){
        $dokumen=Dokumen::where('id',$id)->get();
        $decode = json_decode($dokumen,true);
        $berkas = $decode[0]['file'];
        $this->dropbox->delete('public/berkas/'.$berkas);
        $dokumen = Dokumen::where('id',$id)->delete();
        return redirect('daftar-penyimpanan')->withSuccess1('Successfully delete');
    }

    public function daftardokumen(){
        $datas = DB::table('dokumens as d')
            ->select('d.id','d.nama_dokumen','d.diskripsi','d.kurun_waktu','d.tingkat_perkembangan','d.media_arsip','d.kondisi','d.file','d.no_takah','d.status',
                'jd.kode_jenis','jd.nama_jenis')
            ->join('status_dokumens as sd','d.kondisi_dokumen','=','sd.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where('d.status','=','aktif')
            ->orWhere('d.status','=','inaktif')
            ->orWhere('d.status','=','ditinjau ulang')
            ->orWhere('d.status','=',null)
            ->get();
        return view('dokumen.daftardokumen',compact('datas'));
    }
    public function view($id){
        $data = DB::table('dokumens as d')
            ->select('file')
            ->where('d.id','=',$id)
            ->get();
        $decode = json_decode($data,true);
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
        return view('dokumen.perviewdokumen',compact('gambar'));
    }

    public function arcive(){
        $datas = DB::table('dokumens as d')
            ->select('d.id','d.nama_dokumen','d.diskripsi','d.kurun_waktu','d.tingkat_perkembangan','d.media_arsip','d.kondisi','d.file','d.no_takah','d.status','kondisi_dokumen',
                'jd.kode_jenis','jd.nama_jenis')
            ->join('status_dokumens as sd','d.kondisi_dokumen','=','sd.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where([
                ['d.status','=','musnah'],
                ['kondisi_dokumen','=','3']
                ])
            ->get();
        return view('dokumen.arcive',compact('datas'));
    }

    public function ViewArc($id){
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

        return view('dokumen.viewArcive',compact('dokumen','file','gambar'));
    }
}
