<?php

namespace Railken\Laravel\Core\Action\Notification\Attributes\Name\Exceptions;

use Railken\Laravel\Core\Action\Notification\Exceptions\NotificationAttributeException;

class NotificationNameNotUniqueException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'name';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_NAME_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
