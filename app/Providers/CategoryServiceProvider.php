<?php

namespace App\Providers;

use App\Services\CategoryHelper;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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
        $this->app->bind(CategoryHelper::class, function()
        {
            return new CategoryHelper();
        });
    }
}
