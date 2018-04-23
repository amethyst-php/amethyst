<?php

namespace Railken\Laravel\Core\Data\User\Exceptions;

class UserNotAuthorizedException extends UserException
{

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'USER_NOT_AUTHORIZED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
