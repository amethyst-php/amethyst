<?php

namespace Railken\Laravel\Core\Data\Log\Attributes\Type\Exceptions;

use Railken\Laravel\Core\Data\Log\Exceptions\LogAttributeException;

class LogTypeNotUniqueException extends LogAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'type';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'LOG_TYPE_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}
