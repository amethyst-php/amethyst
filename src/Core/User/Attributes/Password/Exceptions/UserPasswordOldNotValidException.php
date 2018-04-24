<?php

namespace Railken\LaraOre\Core\User\Attributes\Password\Exceptions;

use Railken\LaraOre\Core\User\Exceptions\UserAttributeException;

class UserPasswordOldNotValidException extends UserAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'password_old';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'USER_PASSWORD_OLD_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
