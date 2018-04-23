<?php

namespace Railken\Laravel\Core\Action\Email\Exceptions;

class EmailNotAuthorizedException extends EmailException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EMAIL_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
