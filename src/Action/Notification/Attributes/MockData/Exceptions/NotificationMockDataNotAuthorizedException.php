<?php

namespace Railken\Laravel\Core\Action\Notification\Attributes\MockData\Exceptions;

use Railken\Laravel\Core\Action\Notification\Exceptions\NotificationAttributeException;

class NotificationMockDataNotAuthorizedException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'mock_data';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_MOCK_DATA_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
