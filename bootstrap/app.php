<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function() {
            Route::middleware('web')
                ->prefix('auth/')
            ->group(base_path('routes/auth.php'));

            Route::middleware('web')
                ->prefix('/usuarios')
                ->group(base_path('routes/users.php'));

            Route::middleware('web')
                ->prefix('/publicaciones')
                ->group(base_path('routes/posts.php'));

            Route::middleware('web')
                ->prefix('eventos')
                ->group(base_path('routes/events.php'));

            Route::middleware('web')
                ->prefix('/ventas-comida')
                ->group(base_path('routes/food_products.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(fn(\Illuminate\Http\Request $request) => route('login.email'));

        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);

        $middleware->alias([
            'user_activated' => \App\Http\Middleware\ActiveUserMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
