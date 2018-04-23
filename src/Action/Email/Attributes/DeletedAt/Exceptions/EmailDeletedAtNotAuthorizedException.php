<?php

namespace Railken\Laravel\Core\Action\Email\Attributes\DeletedAt\Exceptions;

use Railken\Laravel\Core\Action\Email\Exceptions\EmailAttributeException;

class EmailDeletedAtNotAuthorizedException extends EmailAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'deleted_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EMAIL_DELETED_AT_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
