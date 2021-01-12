<?php
namespace App\Http\Middleware;

use Closure;

class Setlocale
{
    public function handle($request, Closure $next)
    {

        if(is_null($request->segment(1))) {
            return redirect('az');
        }
        return $next($request);
    }
}
