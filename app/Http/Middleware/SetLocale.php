<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = request()->header('Accept-Language') ?? 'ar';
        if (!in_array($lang, config('app.available_locales'))) {
            $lang = 'ar';
        }
        // Set the application locale based on the preferred language
        app()->setLocale($lang);

        return $next($request);
    }
}
