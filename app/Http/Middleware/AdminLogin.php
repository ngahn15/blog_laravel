<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLogin
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

        // dd(Auth::guard('admin')->check());
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }
        else{
            return redirect('admin/login');    
        }
    }
}