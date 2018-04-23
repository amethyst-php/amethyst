<?php

namespace Railken\LaraOre\Action\Notification\Attributes\Template\Exceptions;

use Railken\LaraOre\Action\Notification\Exceptions\NotificationAttributeException;

class NotificationTemplateNotUniqueException extends NotificationAttributeException
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
    protected $code = 'NOTIFICATION_TEMPLATE_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
