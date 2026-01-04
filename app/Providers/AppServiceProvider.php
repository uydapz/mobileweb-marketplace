<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('components.layouts.HomeLayout', 'HomeLayout');
        Blade::component('components.layouts.LoginLayout', 'LoginLayout');
        Blade::component('components.layouts.DashboardLayout', 'DashLayout');
        Blade::component('components.organisms.Header', 'Header');
        Blade::component('components.organisms.Footer', 'Footer');
        Blade::component('components.organisms.Bottom', 'Bottom');
        Blade::component('components.atoms.loader', 'Loader');
        Blade::component('components.atoms.sectmark', 'Sectmark');

        Paginator::useBootstrapFive();

        view()->composer('*', function ($view) {
            $locales = [];
            foreach ((array) LaravelLocalization::getSupportedLocales() as $locale => $props) {
                $locales[] = [
                    'icon' => 'fa fa-flag',
                    'label' => $props['native'] ?? $locale,
                    'href' => (string) LaravelLocalization::getLocalizedURL($locale, null, [], true),
                ];
            }
            $view->with('locales', $locales);
        });
    }
}
