<?php

namespace ChinLeung\MultilingualRoutes;

use Closure;

class DetectRequestLocale
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
        $locale = strtok(request()->getHost(),'.');

        if (in_array($locale, locales())) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
