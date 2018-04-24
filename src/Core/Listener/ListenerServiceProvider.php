<?php

namespace Railken\LaraOre\Core\Listener;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class ListenerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        Listener::observe(ListenerObserver::class);

        Event::listen('Core*', function ($event_name, $events) {
            $lm = new \Railken\LaraOre\Core\Listener\ListenerManager();
            $elm = new \Railken\LaraOre\Core\EventLog\EventLogManager();
            $listeners = $lm->getRepository()->findByEventClass($event_name);

            foreach ($listeners as $listener) {
                foreach ($events as $event) {
                    $listener->action->resolve($event);
                }
            }

            $result = $elm->create([
                'event_class' => $event_name,
                'vars'        => serialize($events),
            ]);
        });
    }
}
