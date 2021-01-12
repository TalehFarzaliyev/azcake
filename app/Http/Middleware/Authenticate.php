<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    /**
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo(Request $request)
    {
        if (! $request->expectsJson()) {

            if ($request->segment(2) == 'admin') {
                return route('admin.login');
            }

            if (!auth()->guard('customer')->check()) {
                return route('login');
            }

            return false;
        }
    }
}
