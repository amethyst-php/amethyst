<?php

namespace Railken\Laravel\Core\Data\User\Attributes\Password\Exceptions;

use Railken\Laravel\Core\Data\User\Exceptions\UserAttributeException;

class UserPasswordNotDefinedException extends UserAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'password';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'USER_PASSWORD_NOT_DEFINED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is required";
}
