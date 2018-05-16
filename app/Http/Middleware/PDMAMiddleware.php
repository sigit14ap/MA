<?php

namespace App\Http\Middleware;

use Closure;

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
            return redirect('/home/pusat');
        }elseif (Auth::user()->role == 'lembaga') {
            return redirect('/home/lembaga');
        }
        return $next($request);
    }
}
