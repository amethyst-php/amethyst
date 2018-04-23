<?php

namespace Railken\LaraOre\Core\EventLog\Attributes\Vars\Exceptions;

use Railken\LaraOre\Core\EventLog\Exceptions\EventLogAttributeException;

class EventLogVarsNotValidException extends EventLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'vars';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EVENTLOG_VARS_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
