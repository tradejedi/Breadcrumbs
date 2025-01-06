<?php

namespace App\Providers;

use App\Contracts\BreadcrumbsContract;
use App\Services\BreadcrumbsService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/breadcrumbs.php', 'breadcrumbs');
        $this->app->singleton(BreadcrumbsContract::class, BreadcrumbsService::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/breadcrumbs'),
        ], 'breadcrumbs-views');
        $this->publishes([__DIR__ . '/../config/breadcrumbs.php', config_path('breadcrumbs.php')],
            'breadcrumbs-config');

        Blade::componentNamespace('TradeJedi\Breadcrumbs\View\Components', 'breadcrumbs');
    }
}
