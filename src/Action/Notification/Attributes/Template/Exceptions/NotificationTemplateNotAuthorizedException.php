<?php

namespace Railken\Laravel\Core\Action\Notification\Attributes\Template\Exceptions;

use Railken\Laravel\Core\Action\Notification\Exceptions\NotificationAttributeException;

class NotificationTemplateNotAuthorizedException extends NotificationAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'template';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'NOTIFICATION_TEMPLATE_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
