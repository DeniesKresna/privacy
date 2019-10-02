<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckNilai
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
            if(in_array(Auth::user()->role, ['admin','superadmin','guru']))
                return $next($request);
            else
                return response()->json(['message'=>"Maaf Anda Bukan Admin atau Guru"],401);
        else
            return response()->json(['message'=>"Silakan Login dahulu"],401);
            //return redirect('/login')->with('error', 'Silakan Login dahulu');
    }
}
