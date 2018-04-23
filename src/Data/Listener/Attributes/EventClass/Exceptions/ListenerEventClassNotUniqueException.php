<?php

namespace Railken\Laravel\Core\Data\Listener\Attributes\EventClass\Exceptions;

use Railken\Laravel\Core\Data\Listener\Exceptions\ListenerAttributeException;

class ListenerEventClassNotUniqueException extends ListenerAttributeException
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
    protected $code = 'LISTENER_EVENT_CLASS_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
