<?php

namespace Railken\LaraOre\Core\User\Attributes\DeletedAt\Exceptions;

use Railken\LaraOre\Core\User\Exceptions\UserAttributeException;

class UserDeletedAtNotAuthorizedException extends UserAttributeException
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
    protected $code = 'USER_DELETED_AT_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
