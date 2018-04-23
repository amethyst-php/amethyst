<?php

namespace Railken\LaraOre\Action\Email\Attributes\CreatedAt\Exceptions;

use Railken\LaraOre\Action\Email\Exceptions\EmailAttributeException;

class EmailCreatedAtNotValidException extends EmailAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EMAIL_CREATED_AT_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
