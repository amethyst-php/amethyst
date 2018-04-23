<?php

namespace Railken\LaraOre\Action\Email\Attributes\Targets\Exceptions;

use Railken\LaraOre\Action\Email\Exceptions\EmailAttributeException;

class EmailTargetsNotAuthorizedException extends EmailAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'targets';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EMAIL_TARGETS_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
