<?php

namespace Railken\Laravel\Core\Data\Notification\Attributes\CreatedAt\Exceptions;

use Railken\Laravel\Core\Data\Notification\Exceptions\NotificationAttributeException;

class NotificationCreatedAtNotUniqueException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_CREATED_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
