<?php

namespace Railken\Laravel\Core\Action\CsvReport\Exceptions;

class CsvReportNotAuthorizedException extends CsvReportException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CSVREPORT_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
