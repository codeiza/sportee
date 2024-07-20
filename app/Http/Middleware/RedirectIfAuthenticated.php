<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, $guard=null)
    {
        if (Auth::guard($guard)->check()) {
            // Check the user's role
            if (Auth::user()->role == '1') {
                return redirect('/admin/index'); // Redirect admin to dashboard
            } else {
                return redirect('/home'); // Redirect regular user to home
            }
        }

        return $next($request);
    }
}
