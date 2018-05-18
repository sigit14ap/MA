<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PDMAMiddleware
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
        if (!Auth::check()) {
            return redirect('/login');
        }elseif (Auth::user()->role == 'pusat') {
            return redirect('/home');
        }elseif (Auth::user()->role == 'lembaga') {
            return redirect('/home/lembaga');
        }
        return $next($request);
    }
}
