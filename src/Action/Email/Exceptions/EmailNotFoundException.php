<?php

namespace Railken\Laravel\Core\Action\Email\Exceptions;

class EmailNotFoundException extends EmailException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EMAIL_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
