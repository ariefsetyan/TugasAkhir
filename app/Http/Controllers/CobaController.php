<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function dinamicInput(){
        return view('fileCoba.dinamicInput');
    }
    public function ProsesdinamicInput(Request $request){
        $datas = json_encode($request->all());
        dd($datas);
    }
}
