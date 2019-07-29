<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    public function index(){
        if (session('success')){
            Alert::success('Success Add', 'Data berhasil disimpan');
        }elseif (session('success1')){
            Alert::success('Success Delete', 'Data berhasil dihapus');
        }elseif (session('success2')){
            Alert::success('Success update', 'Data berhasil diperbarui');
        }
        $karyawan = Karyawan::all();
        return view('pegawai.pegawai', compact('karyawan'));
    }
    public function simpan(Request $request){
        $karyawan = new Karyawan();
        $karyawan->nip = $request->nip;
        $karyawan->nama_pegawai = $request->nama;
        $karyawan->alamat_pegawai = $request->alamat;
        $karyawan->jkl_pegawai = $request->jkl;
        $karyawan->email_pegawai = $request->email;
        $karyawan->tlp_pegawai = $request->telp;
//        dd($karyawan);
        $karyawan->save();
        return redirect('karyawan')->withSuccess('Successfully add');

    }
    public function delete($nip){
        $karyawan = Karyawan::where('nip',$nip)->delete();
        return back()->withSuccess1('Successfully delete');
    }
    public function show($nip){
        $karyawan = DB::table('karyawans')->where('nip','=',$nip)->get();
//        dd($karyawan);
        return view('pegawai.show',compact('karyawan'));
    }
    public function update(Request $request){
        $karyawan = DB::table('karyawans')->where('nip','=',$request->nip)
            ->update([
               'nama_pegawai' => $request->nama,
               'alamat_pegawai' => $request->alamat,
               'jkl_pegawai' => $request->jkl,
               'email_pegawai' => $request->email,
               'tlp_pegawai' => $request->telp,
            ]);
        return back()->withSuccess2('Successfully update');
    }
}
