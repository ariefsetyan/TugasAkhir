<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\JenisDokumen;
use App\Karyawan;
use App\Peminjaman;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function coba(){
        $dokumens = Dokumen::all();
        return view('peminjaman.formpeminjaman2',compact('dokumens'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = User::all();
        $dokumens = Dokumen::all();
        $datas = DB::table('peminjamen as p')
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->get();
//        dd($datas);
        return view('peminjaman.formPeminjaman',compact('karyawans','dokumens','datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $peminjaman = new Peminjaman();
        $peminjaman->id_karyawan = $request->nip;
        $peminjaman->id_dokumen = $request->dokumen;
        $peminjaman->diskripsi_peminjaman = $request->deskripsi;
        $peminjaman->tgl_pinjam = $request->wPinjam;
        $peminjaman->tgl_kembali = $request->wKembali;
        $peminjaman->id_status = 1;
//        dd($peminjaman);
        $peminjaman->save();
        return redirect('daftar-peminjaman');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function daftar()
    {
        $karyawans = User::all();
        $dokumens = Dokumen::all();
        $datas = DB::table('peminjamen as p')
            ->select('p.id','p.diskripsi_peminjaman','p.tgl_pinjam','p.tgl_kembali','p.id_karyawan','p.id_dokumen',
                'u.nip','u.name','u.address','u.email','u.tlp',
                'd.nama_dokumen','kode_jenis')
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where('id_status','=','1')
            ->get();
//        dd($datas);
        return view('peminjaman.daftar',compact('datas','karyawans','dokumens'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = DB::table('peminjamen as p')->where('p.id','=',$id)
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->get();
//        dd($datas);
        return view('peminjaman.detil',compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawans = User::all();
        $dokumens = Dokumen::all();
        $datas = DB::table('peminjamen as p')->where('p.id',$id)
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','d.id','=','p.id_dokumen')->get();
//        dd($datas);
        return view('peminjaman.formedit',compact('datas','karyawans','dokumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = DB::table('peminjamen')->where('id',$id)->update(
            ['diskripsi_peminjaman'=>$request->deskripsi],
            ['tgl_pinjam'=>$request->wPinjam],
            ['tgl_kembali'=>$request->wKembali],
            ['id_karyawan'=>$request->nip],
            ['id_dokumen'=>$request->dokumen]
        );
        return redirect('daftar-peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = DB::table('peminjamen')->where('id','=',$id)->delete();
        return redirect('daftar-peminjam');
    }

    public function pengajuan(){
        $pengajuan = DB::table('peminjamen as p')
            ->select('p.id','nip','name','nama_dokumen','tgl_pinjam','tgl_kembali')
            ->where('id_status','=',3)
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->get();
//        dd($pengajuan);
        return view('peminjaman.pengajuan',compact('pengajuan'));
    }
    public function detil_pengajuan($id){
//        dd($id);
        $pengajuan = DB::table('peminjamen as p')
            ->select('p.id','nip','name','nama_dokumen','tgl_pinjam','tgl_kembali','diskripsi_peminjaman')
            ->where('id_status','=',3)
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->where('p.id','=',$id)
            ->get();
        return view('peminjaman.detailPengajuan',compact('pengajuan'));
    }
    public function terima($id){

        $terima = DB::table('peminjamen')->where('id',$id)
            ->update(
                ['id_status' => 1]
            );
        return redirect('daftar-permohonan');
    }
    public function tolak($id){

        $terima = DB::table('peminjamen')->where('id',$id)
            ->update(
                ['id_status' => 4]
            );
        return redirect('daftar-permohonan');
    }
    public function daftarPengajuan(){
        $datas = DB::table('peminjamen as p')
            ->select('p.id','p.diskripsi_peminjaman','p.tgl_pinjam','p.tgl_kembali','d.nama_dokumen','p.id_status')
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
//            ->where([
//                ['id_status','=','3'],
//                ['id_status','=',4]
//            ])
            ->get();
//        dd($datas);
        return view('peminjaman.daftarpengajuan',compact('datas'));
    }
}