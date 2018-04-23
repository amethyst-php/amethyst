<?php

namespace Railken\Laravel\Core\Data\Config;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        Config::observe(ConfigObserver::class);
    }
}
