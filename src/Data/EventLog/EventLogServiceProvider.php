<?php

namespace Railken\Laravel\Core\Data\EventLog;

use Illuminate\Support\ServiceProvider;

class EventLogServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        EventLog::observe(EventLogObserver::class);
    }
}
