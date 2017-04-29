<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Manager
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
        if(Auth::user()->manager != 1)
        {
            return redirect('login');
        }
        return $next($request);
    }
}
