<?php

namespace Railken\Laravel\Core\Data\Log\Attributes\UpdatedAt\Exceptions;

use Railken\Laravel\Core\Data\Log\Exceptions\LogAttributeException;

class LogUpdatedAtNotAuthorizedException extends LogAttributeException
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
    protected $code = 'LOG_UPDATED_AT_NOT_AUTHTORIZED';
    
    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
