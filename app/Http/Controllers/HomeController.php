<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->isAdmin == 1){
            return redirect('/dashboard');
        }elseif (auth()->user()->isAdmin == 2){
            return redirect('home-kepala');
        }else{
            return view('karyawan.home');
        }
    }
}
