<?php

namespace Railken\LaraOre\Core\Notification\Attributes\Type\Exceptions;

use Railken\LaraOre\Core\Notification\Exceptions\NotificationAttributeException;

class NotificationTypeNotDefinedException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'type';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_TYPE_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
