<?php

namespace Railken\LaraOre\Core\User\Attributes\Role\Exceptions;

use Railken\LaraOre\Core\User\Exceptions\UserAttributeException;

class UserRoleNotUniqueException extends UserAttributeException
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
    protected $code = 'USER_ROLE_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
