<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $language = session()->get('language', app()->getLocale());
        switch ($language) {
            case 'en':
                $language = 'en';
                break;

            default:
                $language = 'vi';
                break;
        }
        app()->setLocale($language);

        return $next($request);
    }
}
