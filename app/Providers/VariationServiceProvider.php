<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\VariationService;

class VariationServiceProvider extends ServiceProvider
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
        $this->app->bind(VariationService::class, function ()
        {
            return new VariationService();
        });
    }
}
