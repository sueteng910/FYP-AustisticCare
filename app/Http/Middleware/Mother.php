<?php

namespace AutisticCare\Http\Middleware;

use Closure;
use Auth;

class Mother
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
        if (Auth::check() && Auth::user()->role == 'mother') {
            return $next($request);
        }
        else if(Auth::check() && Auth::user()->role == 'admin'){
            return redirect('/admin/home');
        }
        
        else {
            return redirect('/therapist/home');
        }
    }
    }

