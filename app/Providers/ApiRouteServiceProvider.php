<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class ApiRouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $apiRoutesPath = base_path('routes/apis');

            foreach (glob("{$apiRoutesPath}/*.php") as $routeFile) {
                Route::middleware('api')
                    ->prefix('api')
                    ->group($routeFile);
            }
        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function ($request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
