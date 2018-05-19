<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LembagaMiddleware
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
        }elseif (Auth::user()->role == 'pdma') {
            return redirect('/home/lembaga');
        }elseif (Auth::user()->role == 'pusat') {
            return redirect('/home/pesantren');
        }
        return $next($request);
    }
}
