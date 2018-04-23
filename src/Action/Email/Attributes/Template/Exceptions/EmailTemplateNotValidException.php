<?php

namespace Railken\LaraOre\Action\Email\Attributes\Template\Exceptions;

use Railken\LaraOre\Action\Email\Exceptions\EmailAttributeException;

class EmailTemplateNotValidException extends EmailAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'template';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EMAIL_TEMPLATE_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
