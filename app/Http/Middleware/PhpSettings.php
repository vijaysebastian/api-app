<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PhpSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Set PHP settings for the request
        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', '60'); // in seconds
        ini_set('upload_max_filesize', '10M');
        return $next($request);
    }
}
