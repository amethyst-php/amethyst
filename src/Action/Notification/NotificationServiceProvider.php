<?php

namespace Railken\Laravel\Core\Action\Notification;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        Notification::observe(NotificationObserver::class);
    }
}
