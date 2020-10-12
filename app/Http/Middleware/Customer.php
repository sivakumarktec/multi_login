<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // print_r($request->fullurl());
        // print_r(Auth::guard($guard)->check().'2');
        // die();
        if (isset($guard) && !$guard == 'customer' && !Auth::guard($guard)->check()) {
            return redirect('customer/login')->with('info', 'You must be logged in!');
        }
        return $next($request);
    }
}
