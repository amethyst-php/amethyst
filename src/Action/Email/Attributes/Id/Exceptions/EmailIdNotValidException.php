<?php

namespace Railken\Laravel\Core\Action\Email\Attributes\Id\Exceptions;

use Railken\Laravel\Core\Action\Email\Exceptions\EmailAttributeException;

class EmailIdNotValidException extends EmailAttributeException
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
    protected $code = 'EMAIL_ID_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
