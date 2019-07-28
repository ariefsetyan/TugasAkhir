<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    public function index(){
        if (session('success')){
            Alert::success('Success Add', 'Data berhasil disimpan');
        }elseif (session('success1')){
            Alert::success('Success Delete', 'Data berhasil dihapus');
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
}
