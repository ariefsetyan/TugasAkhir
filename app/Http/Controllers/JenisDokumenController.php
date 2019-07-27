<?php

namespace App\Http\Controllers;

use App\JenisDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class JenisDokumenController extends Controller
{
    public function FormJenisData(){
        $cekdata = DB::table('jenis_dokumens')->count('no_takah');
        $datas = JenisDokumen::all();
        if (session('success_message')){
            Alert::success('Data Berhasil Disimpan', session('Success Message'));
        }elseif (session('success')){
            alert()->success('Data Berhasil dihapus','');
        }elseif (session('success1')){
            alert()->success('Data Berhasil Diupdate','');
        }

        return view('jenisDokumen.jenisDokumen',compact('datas','cekdata'));
    }
    public function Simpan(Request $request){
        $datas = new JenisDokumen();
        $datas->no_takah = $request->noTakah;
        $datas->kode_jenis = $request->kode;
        $datas->nama_jenis = $request->nama;
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
