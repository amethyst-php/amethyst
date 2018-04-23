<?php

namespace Railken\Laravel\Core\Action\Notification\Attributes\DeletedAt\Exceptions;

use Railken\Laravel\Core\Action\Notification\Exceptions\NotificationAttributeException;

class NotificationDeletedAtNotValidException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'deleted_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_DELETED_AT_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
