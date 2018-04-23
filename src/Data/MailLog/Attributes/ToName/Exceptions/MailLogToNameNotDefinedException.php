<?php

namespace Railken\Laravel\Core\Data\MailLog\Attributes\ToName\Exceptions;

use Railken\Laravel\Core\Data\MailLog\Exceptions\MailLogAttributeException;

class MailLogToNameNotDefinedException extends MailLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'to_name';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLOG_TO_NAME_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
