<?php

namespace App\Http\Controllers;

use App\JenisDokumen;
use App\LokasiSimpan;
use Illuminate\Http\Request;
Use Alert;

class LokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $lokasi = LokasiSimpan::all();
        $jenisDokumen = JenisDokumen::all();
        if (session('success')){
            Alert::success('Success Add', 'Data Berhasil Disimpan');
        }elseif (session('success1')){
            Alert::success('Success Delete', 'Data Berhasil Dihapus');
        }elseif(session('success2')){
            Alert::success('Success Update', 'Data Berhasil Disimpan');
        }
        return view('lokasiSimpan.lokasiSimpan',compact('lokasi','jenisDokumen'));
    }
    public function simpan(Request $request){
//        dd($request->all());
        $lokasi = new LokasiSimpan();
//        $lokasi->no_takah = $request->jenis;
        $lokasi->gedung = $request->gedung;
        $lokasi->rak = $request->rak;
        $lokasi->baris = $request->baris;
        $lokasi->bok = $request->boks;
        $lokasi->folder = $request->folder;
        $lokasi->save();
        return back()->withSuccess('Successfully add');
    }
    public function delete($id){
        $lokasi = LokasiSimpan::where('id',$id)->delete();
        return back()->withSuccess1('Successfully delete');
    }
    public function update(Request $request){
        $lokasi = LokasiSimpan::find($request->id);
        $lokasi->gedung = $request->gedung;
        $lokasi->rak = $request->rak;
        $lokasi->baris = $request->baris;
        $lokasi->bok = $request->boks;
        $lokasi->folder = $request->folder;
        $lokasi->save();
        return back()->withSuccess2('Successfully Update');
    }
}
