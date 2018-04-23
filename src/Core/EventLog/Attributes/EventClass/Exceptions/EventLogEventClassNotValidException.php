<?php

namespace Railken\LaraOre\Core\EventLog\Attributes\EventClass\Exceptions;

use Railken\LaraOre\Core\EventLog\Exceptions\EventLogAttributeException;

class EventLogEventClassNotValidException extends EventLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'event_class';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EVENTLOG_EVENT_CLASS_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
