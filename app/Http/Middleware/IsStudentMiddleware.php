<?php

namespace App\Http\Middleware;

use Closure;

class IsStudentMiddleware
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
        if (auth()->user()->role != "student"){

            abort(401);
        }

        return $next($request);
    }
}
