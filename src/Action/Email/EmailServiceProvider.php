<?php

namespace Railken\LaraOre\Action\Email;

use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        Email::observe(EmailObserver::class);
    }
}
