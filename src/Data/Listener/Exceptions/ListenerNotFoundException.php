<?php

namespace Railken\Laravel\Core\Data\Listener\Exceptions;

class ListenerNotFoundException extends ListenerException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LISTENER_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
