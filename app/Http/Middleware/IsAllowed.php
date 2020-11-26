<?php

namespace App\Http\Middleware;

use Closure;

class IsAllowed
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
        if (in_array($request->user()->id, config("access.ALLOWED"))) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
