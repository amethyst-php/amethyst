<?php

namespace Railken\Laravel\Core\Action\Email\Attributes\Id\Exceptions;

use Railken\Laravel\Core\Action\Email\Exceptions\EmailAttributeException;

class EmailIdNotAuthorizedException extends EmailAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EMAIL_ID_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
