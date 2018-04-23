<?php

namespace Railken\Laravel\Core\Data\Notification\Attributes\NotifiableType\Exceptions;

use Railken\Laravel\Core\Data\Notification\Exceptions\NotificationAttributeException;

class NotificationNotifiableTypeNotValidException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'notifiable_type';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_NOTIFIABLE_TYPE_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
