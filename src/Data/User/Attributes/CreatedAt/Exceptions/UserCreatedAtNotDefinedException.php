<?php

namespace Railken\Laravel\Core\Data\User\Attributes\CreatedAt\Exceptions;

use Railken\Laravel\Core\Data\User\Exceptions\UserAttributeException;

class UserCreatedAtNotDefinedException extends UserAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'USER_CREATED_AT_NOT_DEFINED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is required";
}
