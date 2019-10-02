<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
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
        if(Auth::check())
            return $next($request);
        else
            return response()->json(['message'=>"Silakan Login Dahulu"],401);
            //return redirect('/login')->with('error', 'Silakan Login dahulu');
    }
}
