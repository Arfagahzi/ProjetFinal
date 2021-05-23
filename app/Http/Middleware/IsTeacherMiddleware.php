<?php

namespace App\Http\Middleware;

use Closure;

class IsTeacherMiddleware
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
        if (auth()->user()->role != "teacher"){

            abort(401);
        }

        return $next($request);
    }
}
