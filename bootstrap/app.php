<?php

use App\Http\Middleware\EnsureEmailVerified;
use App\Http\Middleware\Guest;
use App\Http\Middleware\MobileOnly;
use App\Http\Middleware\SetLocale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter;
use Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect;
// use Mcamara\LaravelLocalization\Middleware\LocaleViewPath;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'localeSessionRedirect' => LocaleSessionRedirect::class,
            'localizationRedirect'  => LaravelLocalizationRedirectFilter::class,
            'mobile.only'           => MobileOnly::class,
            'SetLocale'           => SetLocale::class,
            'verified' => EnsureEmailVerified::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\HttpException $e) {
        //     $status = $e->getStatusCode();
        //     return response()->view('errors.Dynamic', [
        //         'code' => $status,
        //     ], $status);
        // });

        // // fallback error (non-HTTP)
        // $exceptions->render(function (Throwable $e) {
        //     return response()->view('errors.Dynamic', [
        //         'code' => 500,
        //     ], 500);
        // });
    })->create();
