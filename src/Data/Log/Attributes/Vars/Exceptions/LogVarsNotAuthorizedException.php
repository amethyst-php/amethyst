<?php

namespace Railken\Laravel\Core\Data\Log\Attributes\Vars\Exceptions;

use Railken\Laravel\Core\Data\Log\Exceptions\LogAttributeException;

class LogVarsNotAuthorizedException extends LogAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'vars';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'LOG_VARS_NOT_AUTHTORIZED';
    
    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
