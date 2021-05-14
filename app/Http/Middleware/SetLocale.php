<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
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
        $desiredLocale = $request->segment(1);
        
        if (!in_array($desiredLocale, array_keys(locale()->supported()))) {
            return redirect(locale()->current() . '/' . $request->path());
        }

        locale()->set($desiredLocale);
        return $next($request);
    }
}
