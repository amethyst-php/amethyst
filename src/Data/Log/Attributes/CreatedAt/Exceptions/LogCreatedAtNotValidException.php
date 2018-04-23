<?php

namespace Railken\Laravel\Core\Data\Log\Attributes\CreatedAt\Exceptions;

use Railken\Laravel\Core\Data\Log\Exceptions\LogAttributeException;

class LogCreatedAtNotValidException extends LogAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'LOG_CREATED_AT_NOT_VALID';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not valid";
}
