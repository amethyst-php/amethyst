<?php

namespace Railken\Laravel\Core\Data\MailLog\Exceptions;

class MailLogNotAuthorizedException extends MailLogException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'MAILLOG_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
