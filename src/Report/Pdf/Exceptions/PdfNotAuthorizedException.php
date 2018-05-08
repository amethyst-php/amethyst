<?php

namespace Railken\LaraOre\Report\Pdf\Exceptions;

class PdfNotAuthorizedException extends PdfException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'PDF_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
