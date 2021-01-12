<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($request->segment(2) == 'admin') {
            if (Auth::guard()->check()) {
                return redirect(RouteServiceProvider::HOME);
            } else {
                return $next($request);
            }
        }

        if (Auth::guard('customer')->check()) {
            return redirect(RouteServiceProvider::SITE);
        }

        return $next($request);
    }
}
