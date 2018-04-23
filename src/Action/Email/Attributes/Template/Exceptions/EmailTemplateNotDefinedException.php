<?php

namespace Railken\LaraOre\Action\Email\Attributes\Template\Exceptions;

use Railken\LaraOre\Action\Email\Exceptions\EmailAttributeException;

class EmailTemplateNotDefinedException extends EmailAttributeException
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
    protected $code = 'EMAIL_TEMPLATE_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
