<?php

namespace Railken\LaraOre\Action\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification as IlluminateNotification;

class BaseNotification extends IlluminateNotification implements ShouldQueue
{
    use Queueable;

    public $action;
    public $event;
    public $message;

    /**
     * Create a new event instance.
     *
     * @param Notification $action
     * @param mixed        $event
     * @param string       $message
     *
     * @return void
     */
    public function __construct($action, $event, $message)
    {
        $this->action = $action;
        $this->event = $event;
        $this->message = $message;
        $this->event->class = get_class($event);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'event'   => $this->event,
            'action'  => $this->action,
        ];
    }
}
