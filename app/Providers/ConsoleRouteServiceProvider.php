<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ConsoleRouteServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->routes(function () {
            $this->loadRoutesFrom(base_path('routes/console.php'));
        });
    }
}
