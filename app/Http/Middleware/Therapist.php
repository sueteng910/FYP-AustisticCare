<?php

namespace AutisticCare\Http\Middleware;

use Closure;
use Auth;


class Therapist
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
        if (Auth::check() && Auth::user()->role == 'therapist') {
            return $next($request);
        }
        
        else {
            return redirect('/admin/home');
        }
    }
}
