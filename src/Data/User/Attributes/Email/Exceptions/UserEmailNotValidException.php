<?php

namespace Railken\Laravel\Core\Data\User\Attributes\Email\Exceptions;

use Railken\Laravel\Core\Data\User\Exceptions\UserAttributeException;

class UserEmailNotValidException extends UserAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'email';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'USER_EMAIL_NOT_VALID';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not valid";
}
