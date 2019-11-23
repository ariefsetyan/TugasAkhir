<?php

namespace App\Http\Middleware;

use Closure;

class Atur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tipe = \Auth::user()->isAdmin;

        if($tipe == null){
            return response()->json(['Kesalahan' => 'Kamu bukan admin'], 401);
        }else if($tipe == 1){
        } else if ($tipe == 2){
            return redirect('r');

        }


    }
}
