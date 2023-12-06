<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use function app_path;
use function file_exists;

class DependencyInjectionProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $app = $this->app;
        if (file_exists($dependencies = app_path() . '/Core/Domain/Infrastructure/dependencies.php')) {
            require $dependencies;
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
