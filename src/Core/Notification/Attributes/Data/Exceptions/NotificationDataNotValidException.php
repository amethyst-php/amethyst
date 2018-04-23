<?php

namespace Railken\LaraOre\Core\Notification\Attributes\Data\Exceptions;

use Railken\LaraOre\Core\Notification\Exceptions\NotificationAttributeException;

class NotificationDataNotValidException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'data';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_DATA_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
