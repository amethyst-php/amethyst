<?php

namespace Railken\LaraOre\Report\Pdf\Exceptions;

class PdfNotFoundException extends PdfException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'PDF_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
