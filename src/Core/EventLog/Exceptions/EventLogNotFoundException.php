<?php

namespace Railken\LaraOre\Core\EventLog\Exceptions;

class EventLogNotFoundException extends EventLogException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EVENTLOG_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
