<?php

namespace Railken\LaraOre\Core\Listener\Attributes\ActionType\Exceptions;

use Railken\LaraOre\Core\Listener\Exceptions\ListenerAttributeException;

class ListenerActionTypeNotAuthorizedException extends ListenerAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'action_type';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'LISTENER_ACTION_TYPE_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
