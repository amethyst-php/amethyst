<?php

namespace Railken\LaraOre\Core\EventLog\Attributes\DeletedAt\Exceptions;

use Railken\LaraOre\Core\EventLog\Exceptions\EventLogAttributeException;

class EventLogDeletedAtNotUniqueException extends EventLogAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'deleted_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EVENTLOG_DELETED_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
