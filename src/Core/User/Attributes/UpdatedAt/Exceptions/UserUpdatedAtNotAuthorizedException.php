<?php

namespace Railken\LaraOre\Core\User\Attributes\UpdatedAt\Exceptions;

use Railken\LaraOre\Core\User\Exceptions\UserAttributeException;

class UserUpdatedAtNotAuthorizedException extends UserAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'USER_UPDATED_AT_NOT_AUTHTORIZED';
    
    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
