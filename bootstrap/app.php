<?php

use Illuminate\Foundation\Application;
use Bootstrap\RegisterException;
use Bootstrap\RegisterMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(new RegisterMiddleware())
    ->withExceptions(new RegisterException())
    ->create();
