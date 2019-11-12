<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KepalaController extends Controller
{
    public function index(){
        if (session('success')){
            toast('Success approve','success');
        }
        $datas = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where([
                ['status','=','musnah'],
                ['kondisi_dokumen','=','1']
            ])
            ->orWhere([
                ['status','=','ditinjau ulang'],
                ['kondisi_dokumen','=','1']
            ])
            ->get();
//        dd($datas);
        return view('kepalaBalai.home',compact('datas'));
    }
    public function setuju(){
        $datas = DB::table('dokumens as d')
            ->join('jenis_dokumens as jd','d.no_takah','=','jd.no_takah')
            ->where([
                ['status','=','musnah'],
                ['kondisi_dokumen','=','1']
            ])
            ->orWhere([
                ['status','=','ditinjau ulang'],
                ['kondisi_dokumen','=','1']
            ])
            ->get();
        foreach ($datas as $data){
            DB::table('dokumens')
                ->where('id','=',$data->id)
                ->update(['kondisi_dokumen' => '2']);
        }
        return redirect('home-kepala')->withSuccess('Successfully');
    }
}
