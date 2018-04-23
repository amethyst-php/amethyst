<?php

namespace Railken\LaraOre\Core\Log\Attributes\Id\Exceptions;

use Railken\LaraOre\Core\Log\Exceptions\LogAttributeException;

class LogIdNotUniqueException extends LogAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'LOG_ID_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}
