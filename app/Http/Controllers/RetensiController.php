<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetensiController extends Controller
{
    public function index(){
        return view('retensi.daftar');
    }
}
