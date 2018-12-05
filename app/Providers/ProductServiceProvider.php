<?php

namespace App\Providers;

use App\Services\ProductHelper;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
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
        $this->app->bind(ProductHelper::class, function ()
        {
            return new ProductHelper();
        });
    }
}
