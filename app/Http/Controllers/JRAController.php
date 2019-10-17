<?php

namespace App\Http\Controllers;

use App\JenisDokumen;
use App\JRA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Alert;

class JRAController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if (session('warning')){
            alert()->warning('Warning','Kode Jenis tidak bileh kosong');
        }elseif (session('success')){
            Alert::success('Success', 'Data berhasil di simpan');
        }elseif (session('success1')){
            Alert::success('Success', 'Data berhasil di hapus');
        }

        $jenisDoc = JenisDokumen::all();
        $jra = DB::table('j_r_a_s as jra')->join('jenis_dokumens as jd','jra.kode_jenis','=','jd.no_takah')->get();
        return view('jra/jra', compact('jenisDoc','jra'));
    }
    public function Simpan(Request $request){
        $jra = new JRA();
        if ($request->kdjenis == "Select..."){
            return back()->withwarning('Successfully');
        }else{
            $jra->nm_jenis_jra = $request->nama;
            $jra->aktif = $request->aktif;
            $jra->inaktif = $request->inaktif;
            $jra->sifat_dokumen = $request->sifat;
            $jra->kode_jenis = $request->kdjenis;
            $jra->save();
            return back()->withSuccess('Successfully');
        }
    }
    public function Update(Request $request){
        $update = JRA::find($request->id);
        $update->nm_jenis_jra = $request->nama;
        $update->aktif = $request->aktif;
        $update->inaktif = $request->inaktif;
        $update->sifat_dokumen = $request->sifat;
        $update->kode_jenis = $request->kdjenis;
        $update->save();
        return back()->withSuccess('Successfully update');
    }
    public function Delete($id){
        $data = JRA::where('id',$id)->delete();
        return back()->withSuccess1('Successfully delete');
    }
}
