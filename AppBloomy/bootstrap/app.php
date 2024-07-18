<?php

use App\Http\Middleware\Check_LoginAdmin;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            // $middleware->append(Check_LoginAdmin::class),
            'isAdmin' => \App\Http\Middleware\Check_LoginAdmin::class,
            // 'isProcess_Admin' => \App\Http\Middleware\Check_ProcessAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
