<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Peminjaman;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //Penyiapkan Client Disk Dropbox
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }
    public function index(){
        if (session('success')){
            Alert::success('Success Add', 'Data berhasil disimpan');
        }elseif (session('success1')){
            Alert::success('Success Delete', 'Data berhasil dihapus');
        }elseif (session('success2')){
            Alert::success('Success update', 'Data berhasil diperbarui');
        }elseif(session('info')){
            Alert::info('Gagal simpan', 'No. Telp Harus berawalan 62');
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
        $karyawan->password = Hash::make('1sampai8');
        $karyawan->tlp = $request->telp;

//        if (strpos($karyawan->tlp,"62")){
            $karyawan->save();
//        }else{
//            return redirect('karyawan')->withInfo('Successfully add');
//        }
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

    public function pengajuan(){
        if (session('info')){
            Alert::info('Gagal simpan', 'Tanggal Pinjam tidak boleh melebihi Kanggal Kembali');
        };
        $dokumens = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->get();
//        dd($dokumens);
        $date = date('Y-m-d');
        return view('karyawan.formPengajuan',compact('dokumens','date'));
    }
    public function prosesPengajuan(Request $request){
        $datas = new Peminjaman();
        $datas->diskripsi_peminjaman = $request->deskripsi;
        $datas->tgl_pinjam = $request->tglpinjam;
        $datas->tgl_kembali = $request->tglkembali;

        $pecah = explode('-', $request->tglpinjam);
//        dd($pecah);
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
        $datas->bulan = $bln;
        $datas->tahun = $pecah[0];

        $datas->id_karyawan = $request->idUser;
        $datas->id_dokumen = $request->dokumen;
        $datas->id_status = 3;


        $namakaryawan = $request->nama;
        $email = $request->email;
         $namaDokumen = DB::table('dokumens')
             ->select('nama_dokumen')
             ->where('id','=',$request->dokumen)
             ->get();
         $dokumen = json_decode($namaDokumen, true);
         $nmDokumen = $dokumen[0]['nama_dokumen'];
//        dd($datas,$namaDokumen,$nmDokumen);
        $data = array('name'=>"Kepada Bapak Admin", "body" => "Saya Mengajukan permohonan peminjaman dokuemna ".$nmDokumen." ".$request->deskripsi.
            "pada ".$request->tglpinjam." hingga ".$request->tglkembali);
        Mail::send('email.mail',$data,function ($message) use ($namakaryawan, $email) {
            $message->from('ariefsetyan@gmail.com',$namakaryawan);
            // $message->sender('john@johndoe.com', 'John Doe');
            $message->to($email,'Arief Setya');
            // $message->cc('john@johndoe.com', 'John Doe');
            // $message->bcc('john@johndoe.com', 'John Doe');
             $message->replyTo($email, 'John Doe');
            $message->subject('Permohonan Peminjaman Dokumen');
//            $message->priority(3);
            // $message->attach('pathToFile');
        });
        if ( $datas->tgl_pinjam > $datas->tgl_kembali){
            return redirect('form-pengajuan')->withInfo('Successfully add');
        }else{

        $datas->save();

        return redirect('https://wa.me/'.$request->nomer.'?text=test connet app to WhatsApp');
        }
    }
    public function daftarPengajuan(){
        $datas = DB::table('peminjamen as p')
            ->select('p.id','p.diskripsi_peminjaman','p.tgl_pinjam','p.tgl_kembali','d.nama_dokumen','p.id_status')
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->where([
                ['id_status','=','1'],
                ['id_karyawan','=',Auth::user()->id]
            ])->orWhere([
                ['id_status','=','3']
            ])
            ->orWhere([
                ['id_status','=','4']
            ])
            ->get();
//        dd($datas);
//
        return view('karyawan.daftar',compact('datas'));
    }
    public function formEdit($id){
        $datas = DB::table('peminjamen as p')
            ->select('p.id','p.diskripsi_peminjaman','p.tgl_pinjam','p.tgl_kembali',
                'd.nama_dokumen','jd.kode_jenis')
            ->join('users as u','p.id_karyawan','=','u.id')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where(
//                ['id_status','=','3'],
                'p.id','=',$id
            )
            ->get();

        $dokumens = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->get();
//        dd($datas);
        return view('karyawan.formEdit', compact('datas','dokumens'));
    }
    public function viewDokumen($id){
        $data = DB::table('peminjamen as p')
            ->select('file')
            ->join('dokumens as d','p.id_dokumen','=','d.id')
            ->where('p.id','=',$id)
            ->get();
//        dd($data);
        $decode = json_decode($data,true);
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
        return view('karyawan.dokumen',compact('gambar'));
    }
    public function perbaruiAcoun(){
        if (session('success')){
            Alert::success('Success', 'Data berhasil diperbaruhi');
        }
        $idkar = Auth::user()->id;
        $data = DB::table('users')->where('id','=',$idkar)->get();
//        dd($data);
        return view ('karyawan.formAccount',compact('data'));
    }
    public function ubahPss($id, Request $request){
        $perbrui = DB::table('users')
            ->where('id','=',$id)
            ->update(['password'=>Hash::make($request->password)],['tlp'=>$request->telp]);
        return redirect('account')->withSuccess('Success add');
    }
}
