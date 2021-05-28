<?php

namespace App\Http\Middleware;

use Closure;

class IsFullProfileMiddleware
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
        // itha il profile empty redirect formulaire remplir profile
        if(!auth()->user()->profile){
            return redirect()->route("student_profile");
        }
        return $next($request);
    }
}
