<?php

namespace Railken\Laravel\Core\Data\Listener\Attributes\Description\Exceptions;

use Railken\Laravel\Core\Data\Listener\Exceptions\ListenerAttributeException;

class ListenerDescriptionNotDefinedException extends ListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'description';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LISTENER_DESCRIPTION_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
