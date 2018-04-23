<?php

namespace Railken\Laravel\Core\Action\Email\Attributes\Targets\Exceptions;

use Railken\Laravel\Core\Action\Email\Exceptions\EmailAttributeException;

class EmailTargetsNotValidException extends EmailAttributeException
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
    protected $code = 'EMAIL_TARGETS_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
