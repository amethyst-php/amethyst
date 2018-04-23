<?php

namespace Railken\LaraOre\Core\HttpLog\Attributes\Request\Exceptions;

use Railken\LaraOre\Core\HttpLog\Exceptions\HttpLogAttributeException;

class HttpLogRequestNotAuthorizedException extends HttpLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'request';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'HTTPLOG_REQUEST_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
