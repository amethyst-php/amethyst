<?php

namespace Railken\LaraOre\Action\Email\Attributes\Id\Exceptions;

use Railken\LaraOre\Action\Email\Exceptions\EmailAttributeException;

class EmailIdNotUniqueException extends EmailAttributeException
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
    protected $code = 'EMAIL_ID_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
