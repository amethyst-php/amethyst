<?php

namespace Railken\Laravel\Core\Data\Listener\Attributes\UpdatedAt\Exceptions;

use Railken\Laravel\Core\Data\Listener\Exceptions\ListenerAttributeException;

class ListenerUpdatedAtNotUniqueException extends ListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LISTENER_UPDATED_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
