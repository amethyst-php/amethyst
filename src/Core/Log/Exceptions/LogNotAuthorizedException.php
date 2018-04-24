<?php

namespace Railken\LaraOre\Core\Log\Exceptions;

class LogNotAuthorizedException extends LogException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LOG_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
