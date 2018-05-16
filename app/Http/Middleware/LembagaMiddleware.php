<?php

namespace App\Http\Middleware;

use Closure;

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
            return redirect('/home/pdma');
        }elseif (Auth::user()->role == 'pusat') {
            return redirect('/home/pusat');
        }
        return $next($request);
    }
}