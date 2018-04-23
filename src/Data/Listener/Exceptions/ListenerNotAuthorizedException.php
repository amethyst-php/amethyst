<?php

namespace Railken\Laravel\Core\Data\Listener\Exceptions;

class ListenerNotAuthorizedException extends ListenerException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LISTENER_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
