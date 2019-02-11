<?php

namespace Ognjen\Laravel;

use Ognjen\Laravel\Console\Commands\AsyncMailCommand;
use Illuminate\Support\ServiceProvider;

class AsyncMailProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                AsyncMailCommand::class,
            ]);
        }
    }
}
