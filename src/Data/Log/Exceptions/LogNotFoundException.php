<?php

namespace Railken\Laravel\Core\Data\Log\Exceptions;

class LogNotFoundException extends LogException
{

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'Log_NOT_FOUND';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "Not found";
}
