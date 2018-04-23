<?php

namespace Railken\Laravel\Core\Data\User\Attributes\Name\Exceptions;

use Railken\Laravel\Core\Data\User\Exceptions\UserAttributeException;

class UserNameNotValidException extends UserAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'name';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'USER_NAME_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
