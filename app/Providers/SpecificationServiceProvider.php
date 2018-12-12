<?php

namespace App\Providers;

use App\Services\SpecificationService;
use Illuminate\Support\ServiceProvider;

class SpecificationServiceProvider extends ServiceProvider
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
        $this->app->bind(SpecificationService::class, function () {
            return new SpecificationService();
        });
    }
}
