<?php

namespace Railken\Laravel\Core\Data\HttpLog\Exceptions;

class HttpLogNotAuthorizedException extends HttpLogException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'HTTPLOG_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
