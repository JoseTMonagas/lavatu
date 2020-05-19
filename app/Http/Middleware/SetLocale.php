<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class SetLocale
{
    /**
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('locale')) {
            $locale = session('locale');
        } else {
            $locale = 'es';
        }


        app()->setLocale($locale);

        return $next($request);
    }
}
