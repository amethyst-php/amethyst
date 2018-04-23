<?php

namespace Railken\Laravel\Core\Data\Log\Attributes\Message\Exceptions;

use Railken\Laravel\Core\Data\Log\Exceptions\LogAttributeException;

class LogMessageNotUniqueException extends LogAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'message';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'LOG_MESSAGE_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}
