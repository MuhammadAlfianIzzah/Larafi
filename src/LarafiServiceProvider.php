<?php

namespace Alfianizzah\Larafi;

use Alfianizzah\Larafi\Console\GenerateUserCommand;
use Alfianizzah\Larafi\Console\InstallLarafi;
use Illuminate\Support\ServiceProvider;

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
                GenerateUserCommand::class
            ]);
        }
    }
}
