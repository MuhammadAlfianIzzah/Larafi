<?php

namespace Alfianizzah\Larafi;

use Illuminate\Support\ServiceProvider;
use JohnDoe\larafi\Console\InstallLarafi;

class LarafiServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallLarafi::class,
            ]);
        }
    }
}
