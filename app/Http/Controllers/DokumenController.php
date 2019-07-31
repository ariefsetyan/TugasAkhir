<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\JenisDokumen;
use App\JRA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomerdoc = JenisDokumen::all();

//        $nomerdoc = JRA::groupby('kode_jenis')->get();

//        $nomerdoc = DB::table('j_r_a_s')->select('nm_jenis_jra', 'kode_jenis')->count('nm_jenis_jra')->groupBy('kode_jenis')->get();
//        dd($nomerdoc);

        return view('penyimpanan.penyimpanan',compact('nomerdoc'));
//        return view('penyimpanan.penyimpanan',['nomerdoc'=>$nomerdoc]);
    }
    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('j_r_a_s')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $dokumen = new Dokmen();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_jra)
    {

        $jra = JRA::where('kode_jenis',$id_jra)->pluck('nm_jenis_jra','id');
        return json_encode($jra);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
