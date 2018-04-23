<?php

namespace Railken\LaraOre\Core\User\Attributes\Enabled\Exceptions;

use Railken\LaraOre\Core\User\Exceptions\UserAttributeException;

class UserEnabledNotDefinedException extends UserAttributeException
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
    protected $code = 'USER_ENABLED_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
