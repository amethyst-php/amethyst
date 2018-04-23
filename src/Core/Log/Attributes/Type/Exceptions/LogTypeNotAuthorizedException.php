<?php

namespace Railken\LaraOre\Core\Log\Attributes\Type\Exceptions;

use Railken\LaraOre\Core\Log\Exceptions\LogAttributeException;

class LogTypeNotAuthorizedException extends LogAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'type';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'LOG_TYPE_NOT_AUTHTORIZED';
    
    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
