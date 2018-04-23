<?php

namespace Railken\LaraOre\Core\Notification\Attributes\NotifiableId\Exceptions;

use Railken\LaraOre\Core\Notification\Exceptions\NotificationAttributeException;

class NotificationNotifiableIdNotUniqueException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'notifiable_id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_NOTIFIABLE_ID_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
