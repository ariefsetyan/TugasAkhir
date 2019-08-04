<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\JenisDokumen;
use App\JRA;
use App\LokasiSimpan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Spatie\Dropbox\Client;
use Illuminate\Http\File;


class DokumenController extends Controller
{

    public function __construct()
    {
        //Penyiapkan Client Disk Dropbox
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $nomerdoc = JenisDokumen::all();

        return view('penyimpanan.penyimpanan',compact('nomerdoc'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $data = request()->validate([
            'file' => 'required|mimes:pdf|max:10000',
        ]);


        //membuat variabel berkas
        $berkas = $data['file'];
//        dd($berkas);
        //membuat nama berkas
        $namaBerkas = uniqid().'.'.$berkas->getClientOriginalExtension();
        //mengupload berkas
        $berkas->storeAs('/public/berkas/', $namaBerkas, 'dropbox');
        //membuat link untuk berkas
        $response = $this->dropbox->createSharedLinkWithSettings('/public/berkas/'.$namaBerkas);

        //memasukan data berkas ke database
//        Berkas::create([
//            'nama' => $namaBerkas,
//            'ekstensi' => $berkas->getClientOriginalExtension(),
//            'ukuran' => $berkas->getSize()
//        ]);

//        Dokumen::create([
//            'diskripsi' => $request->deskripsi,
//            'kurun_waktu' => $request->kurun_waktu,
//            'tingkat_perkembangan' => $request->tPerkembangan,
//            'media_arsip' => $request->media,
//            'kondisi' => $request->kondisi,
//            'file' => $namaBerkas,
//            'kode_dokumen' => $request->kode,
//            'jenis_dokumen' => $request->jenis
//        ]);
        $dokumen = new Dokumen();
        $dokumen->diskripsi = $request->deskripsi;
        $dokumen->kurun_waktu = $request->tahun;
        $dokumen->tingkat_perkembangan = $request->tPerkembangan;
        $dokumen->media_arsip = $request->media;
        $dokumen->kondisi = $request->kondisi;
        $dokumen->file = $namaBerkas;
        $dokumen->kode_dokumen = $request->kode;
        $dokumen->jenis_dokumen = $request->jenis;
        $dokumen->save();

        $lokasiSimpan = DB::table('lokasi_simpans as ls')->select('jd.kode_jenis','gedung','rak','baris','bok','folder')->join('jenis_dokumens as jd','ls.no_takah','=','jd.no_takah')->get();

        return view('penyimpanan.tampilLokasiSimpan',compact('lokasiSimpan'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_jra)
    {

        $jra = JRA::where('kode_jenis',$id_jra)->pluck('nm_jenis_jra','id');
        return json_encode($jra);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dokumen = DB::table('dokumens as d')->select(
            'd.id','no_takah','jd.kode_jenis','nama_jenis','nm_jenis_jra','aktif','inaktif','sifat_dokumen','diskripsi','kurun_waktu',
            'tingkat_perkembangan','media_arsip','kondisi','file')
            ->join('jenis_dokumens as jd','d.kode_dokumen','=','jd.no_takah')
            ->join('j_r_a_s as j','j.id','=','d.jenis_dokumen')
            ->where('d.id','=',$id)->get();
        $decode = json_decode($dokumen,true);
        $kd_arsip = $decode[0]['no_takah'];
        $berkas = $decode[0]['file'];
        $lokasiarsip = LokasiSimpan::where('no_takah',$kd_arsip)->get();
//        dd($dokumen);
        return view('penyimpanan.formedit',compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        if(empty($request->file)){
            $dokumen = Dokumen::find($id)->update([
                'diskripsi'=>$request->deskripsi,
                'kurun_waktu'=>$request->deskripsi,
                'tingkat_perkembangan'=>$request->deskripsi,
                'media_arsip'=>$request->deskripsi,
                'kondisi'=>$request->deskripsi,

            ]);
        }else{
            $data = request()->validate([
                'file' => 'required|mimes:pdf|max:10000',
            ]);


            //membuat variabel berkas
            $berkas = $data['file'];
//        dd($berkas);
            //membuat nama berkas
            $namaBerkas = uniqid().'.'.$berkas->getClientOriginalExtension();
            //mengupload berkas
            $berkas->storeAs('/public/berkas/', $namaBerkas, 'dropbox');
            //membuat link untuk berkas
            $response = $this->dropbox->createSharedLinkWithSettings('/public/berkas/'.$namaBerkas);

            $dokumen = Dokumen::find($id)->update([
                'diskripsi'=>$request->deskripsi,
                'kurun_waktu'=>$request->deskripsi,
                'tingkat_perkembangan'=>$request->deskripsi,
                'media_arsip'=>$request->deskripsi,
                'kondisi'=>$request->kondisi,
                'file'=>$namaBerkas,
            ]);
        }

        return redirect('daftar-penyimpanan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detil($id)
    {
        $dokumen = DB::table('dokumens as d')->select(
            'no_takah','jd.kode_jenis','nama_jenis','nm_jenis_jra','aktif','inaktif','sifat_dokumen','diskripsi','kurun_waktu',
            'tingkat_perkembangan','media_arsip','kondisi','file')
            ->join('jenis_dokumens as jd','d.kode_dokumen','=','jd.no_takah')
            ->join('j_r_a_s as j','j.id','=','d.jenis_dokumen')
            ->where('d.id','=',$id)->get();
        $decode = json_decode($dokumen,true);
        $kd_arsip = $decode[0]['no_takah'];
        $berkas = $decode[0]['file'];
        $lokasiarsip = LokasiSimpan::where('no_takah',$kd_arsip)->get();
//        dd($file);

        try {
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

        return view('penyimpanan.detilPenyimpanan',compact('dokumen','lokasiarsip','file','gambar'));
    }

    public function daftar(){
        $dokumen = DB::table('dokumens as d')->join('jenis_dokumens as jd','jd.no_takah','=','d.kode_dokumen')->get();
//        dd($dokumen);
        return view('penyimpanan.daftarPenyimpanan',compact('dokumen'));
    }
}
