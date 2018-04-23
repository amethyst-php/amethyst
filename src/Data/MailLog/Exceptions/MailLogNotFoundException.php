<?php

namespace Railken\Laravel\Core\Data\MailLog\Exceptions;

class MailLogNotFoundException extends MailLogException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLOG_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
