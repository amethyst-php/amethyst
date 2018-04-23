<?php

namespace Railken\Laravel\Core\Action\Notification\Exceptions;

class NotificationNotAuthorizedException extends NotificationException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
