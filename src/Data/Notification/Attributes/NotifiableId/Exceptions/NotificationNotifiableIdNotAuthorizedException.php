<?php

namespace Railken\Laravel\Core\Data\Notification\Attributes\NotifiableId\Exceptions;

use Railken\Laravel\Core\Data\Notification\Exceptions\NotificationAttributeException;

class NotificationNotifiableIdNotAuthorizedException extends NotificationAttributeException
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
    protected $code = 'NOTIFICATION_NOTIFIABLE_ID_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
