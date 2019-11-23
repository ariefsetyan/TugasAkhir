<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (auth()->user()->isAdmin == 1){
//            \Log::info("oke");
//            return $next($request);
        }
//        else{
//            \Log::info("oke");
//        }
        return redirect('home')->with('error','You have not admin access');
    }
}
