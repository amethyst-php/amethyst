<?php

namespace Railken\LaraOre\Core\User\Attributes\Enabled\Exceptions;

use Railken\LaraOre\Core\User\Exceptions\UserAttributeException;

class UserEnabledNotAuthorizedException extends UserAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'enabled';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'USER_ENABLED_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
