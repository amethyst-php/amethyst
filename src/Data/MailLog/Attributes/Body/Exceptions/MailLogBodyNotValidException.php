<?php

namespace Railken\Laravel\Core\Data\MailLog\Attributes\Body\Exceptions;

use Railken\Laravel\Core\Data\MailLog\Exceptions\MailLogAttributeException;

class MailLogBodyNotValidException extends MailLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'body';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLOG_BODY_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
