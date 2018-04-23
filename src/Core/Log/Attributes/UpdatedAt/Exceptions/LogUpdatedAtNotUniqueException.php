<?php

namespace Railken\LaraOre\Core\Log\Attributes\UpdatedAt\Exceptions;

use Railken\LaraOre\Core\Log\Exceptions\LogAttributeException;

class LogUpdatedAtNotUniqueException extends LogAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'LOG_UPDATED_AT_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}
