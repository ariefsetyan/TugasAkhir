<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if (session('success')){
            Alert::success('Success Add', 'Data berhasil disimpan');
        }elseif (session('success1')){
            Alert::success('Success Delete', 'Data berhasil dihapus');
        }elseif (session('success2')){
            Alert::success('Success update', 'Data berhasil diperbarui');
        }
        $karyawan = User::all();
        return view('pegawai.pegawai', compact('karyawan'));
    }
    public function simpan(Request $request){
        $karyawan = new User();
        $karyawan->nip = $request->nip;
        $karyawan->name = $request->nama;
        $karyawan->address = $request->alamat;
        $karyawan->gender = $request->jkl;
        $karyawan->email = $request->email;
        $karyawan->password = Hash::make($request->password);
        $karyawan->tlp = $request->telp;
        $karyawan->save();
        return redirect('karyawan')->withSuccess('Successfully add');
    }
    public function delete($nip){
//        dd($nip);
        $karyawan = User::where('nip',$nip)->delete();
        return back()->withSuccess1('Successfully delete');
    }
    public function show($nip){
        $karyawan = DB::table('users')->where('nip','=',$nip)->get();
//        dd($karyawan);
        return view('pegawai.show',compact('karyawan'));
    }
    public function update(Request $request){
        $karyawan = DB::table('users')->where('nip','=',$request->nip)
            ->update([
               'name' => $request->nama,
               'address' => $request->alamat,
               'gender' => $request->jkl,
               'email' => $request->email,
               'tlp' => $request->telp,
            ]);
        return back()->withSuccess2('Successfully update');
    }
}
