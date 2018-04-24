<?php

namespace Railken\LaraOre\Core\User\Attributes\Id\Exceptions;

use Railken\LaraOre\Core\User\Exceptions\UserAttributeException;

class UserIdNotAuthorizedException extends UserAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'USER_ID_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
