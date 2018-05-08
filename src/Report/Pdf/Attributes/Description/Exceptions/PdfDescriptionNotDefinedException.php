<?php

namespace Railken\LaraOre\Report\Pdf\Attributes\Description\Exceptions;

use Railken\LaraOre\Report\Pdf\Exceptions\PdfAttributeException;

class PdfDescriptionNotDefinedException extends PdfAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'description';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'PDF_DESCRIPTION_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
