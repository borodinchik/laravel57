<?php

namespace App\Providers;

use App\Services\ProductImageService;
use Illuminate\Support\ServiceProvider;

class ProductImageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductImageService::class, function ()
        {
            return new ProductImageService();
        });
    }
}
