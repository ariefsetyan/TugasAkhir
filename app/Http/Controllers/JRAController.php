<?php

namespace App\Http\Controllers;

use App\JenisDokumen;
use Illuminate\Http\Request;

class JRAController extends Controller
{
    public function index(){
        $jenisDoc = JenisDokumen::all();
        return view('jra/jra', compact('jenisDoc'));
    }
}
