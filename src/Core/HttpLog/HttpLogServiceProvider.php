<?php

namespace Railken\LaraOre\Core\HttpLog;

use Illuminate\Support\ServiceProvider;

class HttpLogServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        HttpLog::observe(HttpLogObserver::class);
    }
}
