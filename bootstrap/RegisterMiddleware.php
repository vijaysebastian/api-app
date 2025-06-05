<?php
namespace Bootstrap;

use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\PhpSettings;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

class RegisterMiddleware
{
    public function __invoke(Middleware $middleware): void
    {
        $middleware->use([
            \App\Http\Middleware\ForceJsonHeader::class,
            \App\Http\Middleware\EnsureJsonResponse::class,
        ]);
        $middleware->alias([
            'php:settings' => PhpSettings::class,
            'auth:sanctum' => EnsureFrontendRequestsAreStateful::class,
            'verified' => EnsureEmailIsVerified::class,
        ]);
        $middleware->group('api', [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);
    }
}
