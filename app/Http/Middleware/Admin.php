<?php

namespace AutisticCare\Http\Middleware;

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
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }
        else if (Auth::check() && Auth::user()->role == 'mother'){
            return redirect('/mother/home');
        }
        
        else {
            return redirect('/therapist/home');
        }
    }
}
