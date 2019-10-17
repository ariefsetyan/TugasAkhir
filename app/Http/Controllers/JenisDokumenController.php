<?php

namespace App\Http\Controllers;

use App\JenisDokumen;
use App\LokasiSimpan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class JenisDokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function FormJenisData(){
        $lokasi = LokasiSimpan::all();
//        dd($lokasi);
        $cekdata = DB::table('jenis_dokumens')->count('no_takah');
//        $datas = JenisDokumen::all();
        $datas = DB::table('jenis_dokumens as jd')->join('lokasi_simpans as ls','jd.id_lokasi','=','ls.id')->get();
        if (session('success_message')){
            Alert::success('Data Berhasil Disimpan', session('Success Message'));
        }elseif (session('success')){
            alert()->success('Data Berhasil dihapus','');
        }elseif (session('success1')){
            alert()->success('Data Berhasil Diupdate','');
        }
//        dd($datas);
        return view('jenisDokumen.jenisDokumen',compact('datas','cekdata','lokasi'));
    }
    public function Simpan(Request $request){
        $datas = new JenisDokumen();
        $datas->id_lokasi = $request->lokasi;
        $datas->no_takah = $request->noTakah;
        $datas->kode_jenis = $request->kode;
        $datas->nama_jenis = $request->nama;
//        dd($datas);
        $datas->save();
        return redirect('jenis-dokumen')->withSuccessMessage('Successfully added');
    }
    public function Delete($no_takah){
        $datas = DB::table('jenis_dokumens')->where('no_takah','=',$no_takah)->delete();
        return back()->withSuccess('Successfully delete');

    }
    public function Update(Request $request){
        $upadate = DB::table('jenis_dokumens')
            ->where('no_takah','=',$request->noTakah)
            ->update([
           'no_takah' => $request->noTakah,
           'kode_jenis' => $request->kode,
           'nama_jenis' => $request->nama,
        ]);

//        dd($request->all());
        return back()->withSuccess1('Successfully update');

    }
}
