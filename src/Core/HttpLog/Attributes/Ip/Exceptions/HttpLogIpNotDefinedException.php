<?php

namespace Railken\LaraOre\Core\HttpLog\Attributes\Ip\Exceptions;

use Railken\LaraOre\Core\HttpLog\Exceptions\HttpLogAttributeException;

class HttpLogIpNotDefinedException extends HttpLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'ip';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'HTTPLOG_IP_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
