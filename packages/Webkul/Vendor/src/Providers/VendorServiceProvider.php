<?php

namespace Webkul\Vendor\Providers;

use Illuminate\Support\ServiceProvider;

class VendorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'vendor');
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'vendor');
        
        $this->publishes([
            __DIR__ . '/../Config/auth.php' => config_path('auth.php'),
            __DIR__ . '/../Resources/views' => resource_path('views/vendor/vendor'),
        ], 'vendor');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Webkul\Vendor\Contracts\Vendor', 'Webkul\Vendor\Models\Vendor');
        $this->app->bind('Webkul\Vendor\Contracts\Shop', 'Webkul\Vendor\Models\Shop');

        // Override Product Repository with Vendor-aware version when in vendor context
        $this->app->bind(
            'Webkul\Product\Repositories\ProductRepository',
            'Webkul\Vendor\Repositories\ProductRepository'
        );
    }
}