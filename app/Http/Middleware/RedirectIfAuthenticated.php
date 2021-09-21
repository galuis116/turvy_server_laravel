<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){
            case 'admin':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('admin.dashboard');
                }
                break;
            case 'driver':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('driver');
                }
                break;
            case 'partner':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('partner');
                }
                break;
            case 'rider':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('rider');
                }
                break;
        }

        return $next($request);
    }
}
