<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetSiteLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale(
            $request->segment(1) === 'en' ? 'en' : 'ar'
        );

        return $next($request);
    }
}