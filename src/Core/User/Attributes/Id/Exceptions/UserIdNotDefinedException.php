<?php

namespace Railken\LaraOre\Core\User\Attributes\Id\Exceptions;

use Railken\LaraOre\Core\User\Exceptions\UserAttributeException;

class UserIdNotDefinedException extends UserAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'USER_ID_NOT_DEFINED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is required";
}
