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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class PeminjamanController extends Controller
{
    public function coba(){
        $dokumens = Dokumen::all();
        return view('peminjaman.formpeminjaman2',compact('dokumens'));
    }
    public function __construct()
    {
        $this->middleware('auth');
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    public function index()
    {
        $karyawans = User::all();
        $dokumens = Dokumen::all();
//        $datas = DB::table('peminjamen as p')
//            ->join('users as u','p.id_karyawan','=','u.id')
//            ->join('dokumens as d','p.id_dokumen','=','d.id')
//            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
//            ->get();
//        dd($dokumens);
        $date = date('Y-m-d');
        return view('peminjaman.formPeminjaman',compact('karyawans','dokumens','date'));
    }

    public function create(Request $request)
    {
        $pecah = explode('-', $request->wPinjam);
        if ($pecah[1] == '01'){
            $bln = 'Jan';
        }elseif ($pecah[1] == '02'){
            $bln = 'Feb';
        }elseif ($pecah[1] == '03'){
            $bln = 'Mar';
        }elseif ($pecah[1] == '04'){
            $bln = 'Apr';
        }elseif ($pecah[1] == '05'){
            $bln = 'May';
        }elseif ($pecah[1] == '06'){
            $bln = 'Jun';
        }elseif ($pecah[1] == '07'){
            $bln = 'Jul';
        }elseif ($pecah[1] == '08'){
            $bln = 'Aug';
        }elseif ($pecah[1] == '09'){
            $bln = 'Sep';
        }elseif ($pecah[1] == '10'){
            $bln = 'Oct';
        }elseif ($pecah[1] == '11'){
            $bln = 'Nov';
        }elseif ($pecah[1] == '12'){
            $bln = 'Dec';
        }
        $tahun = $pecah[0];

        $dokumen = $request->dokumen;
        for($count = 0; $count < count($dokumen); $count++){
            $data = array(
//                'diskripsi_peminjaman' => $request->deskripsi,
//                'tgl_pinjam' => $request->tglpinjam,
//                'tgl_kembali' => $request->tglkembali,
//                'bulan' => $bln,
//                'tahun'=> $thn,
//                'id_karyawan' => $request->idUser,
//                'id_dokumen' => $dokumen[$count],
//                'id_status' => 3,

                'id_karyawan' => $request->nip,
                'id_dokumen' => $dokumen[$count],
                'diskripsi_peminjaman' => $request->deskripsi,
                'tgl_pinjam' => $request->wPinjam,
                'bulan' => $bln,
                'tahun' => $tahun,
                'tgl_kembali' => $request->wKembali,
                'id_status' => 1
            );
//            dd($data);
            Peminjaman::insert($data);
        }
        return redirect('daftar-peminjaman')->withSuccess('Successfully add');
    }

    public function daftar()
    {
        if (session('success')){
            Alert::success('Success', 'data berhasil disimpan');
        }elseif (session('success1')){
            Alert::success('Success', 'data berhasil diperbaruhi');
        }

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


    public function show($id)
    {
        $datas = DB::table('peminjamen as p')->where('p.id','=',$id)
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->get();
//        dd($datas);

        $decode = json_decode($datas,true);
        $berkas = $decode[0]['file'];

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

        return view('peminjaman.detil',compact('datas','gambar'));
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
//        dd($id);
        $datas = DB::table('peminjamen as p')->where('p.id', '=', $id)
            ->select('p.id','diskripsi_peminjaman','tgl_pinjam','tgl_kembali','id_karyawan','nip','id_dokumen','nama_dokumen')
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','d.id','=','p.id_dokumen')
            ->get();
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
//        dd($request->deskripsi);
//        dd($request->wPinjam);
//        dd($request->wKembali);
//        dd($request->nip);
//        dd($request->dokumen);
        $data = DB::table('peminjamen')->where('id','=',$id)->update([
            'diskripsi_peminjaman'=>$request->deskripsi,
            'tgl_pinjam'=>$request->wPinjam,
            'tgl_kembali'=>$request->wKembali,
            'id_karyawan'=>$request->nip,
            'id_dokumen'=>$request->dokumen
            ]);
        return redirect('daftar-peminjaman')->withSuccess1('Successfully');
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

        //email
//        $nama='Server';
//        $mail='arief.setya57@gmail';
//        $data = array('name'=>"Kepada Bapak john", "body" => "Saya Mengajukan permohonan peminjaman dokumen ");
//        Mail::send('email.mail',$data,function ($message) use ($nama) {
//            $message->from('agung@mail.id','Admin');
//            // $message->sender('john@johndoe.com', 'John Doe');
//            $message->to('agung.prasatu@gmail.com','');
//            // $message->cc('john@johndoe.com', 'John Doe');
//            // $message->bcc('john@johndoe.com', 'John Doe');
//            $message->replyTo('ariefsetyan@gmail.com', 'John Doe');
//            $message->subject('Permohonan Peminjaman Dokumen');
////            $message->priority(3);
//            // $message->attach('pathToFile');
//        });

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
    public function notifwa($id){
        $now = date('y-m-d');
        $datas = DB::table('peminjamen as p')
            ->join('users as u','p.id_karyawan','=','u.id')
            ->where('p.id','=',$id)->get();
//        dd($datas);
        $decode = json_decode($datas,true);
        $tlp = $decode[0]['tlp'];
        return redirect('https://wa.me/'.$tlp);
    }
}
