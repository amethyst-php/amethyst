<?php

namespace Railken\LaraOre\Core\Log\Attributes\Type\Exceptions;

use Railken\LaraOre\Core\Log\Exceptions\LogAttributeException;

class LogTypeNotValidException extends LogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'type';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LOG_TYPE_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
