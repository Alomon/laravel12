<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        apiPrefix: 'api',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Обработка защитника
        $middleware->redirectTo( function (\Illuminate\Http\Request $request) {
            // Для api-запросов
            if ($request->is('api/*')) {
                throw new \App\Exceptions\Api\ApiException('Unauthorized', 401);
            }
            // Для веб-запросов ничего не делаем
            return null;
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
