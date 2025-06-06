<?php

use Illuminate\Foundation\Application;
use Bootstrap\RegisterException;
use Bootstrap\RegisterMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withMiddleware(new RegisterMiddleware())
    ->withExceptions(new RegisterException())
    ->create();
