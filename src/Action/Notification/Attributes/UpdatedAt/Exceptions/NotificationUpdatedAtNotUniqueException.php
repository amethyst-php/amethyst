<?php

namespace Railken\LaraOre\Action\Notification\Attributes\UpdatedAt\Exceptions;

use Railken\LaraOre\Action\Notification\Exceptions\NotificationAttributeException;

class NotificationUpdatedAtNotUniqueException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_UPDATED_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
