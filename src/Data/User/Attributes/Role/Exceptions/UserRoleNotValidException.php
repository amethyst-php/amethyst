<?php

namespace Railken\Laravel\Core\Data\User\Attributes\Role\Exceptions;

use Railken\Laravel\Core\Data\User\Exceptions\UserAttributeException;

class UserRoleNotValidException extends UserAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'role';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'USER_ROLE_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
