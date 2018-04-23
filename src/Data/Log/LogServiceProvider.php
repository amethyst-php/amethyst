<?php

namespace Railken\Laravel\Core\Data\Log;

use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        Log::observe(LogObserver::class);
    }
}
