<?php

namespace Railken\Laravel\Core\Data\EventLog\Exceptions;

class EventLogNotAuthorizedException extends EventLogException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EVENTLOG_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
