<?php

namespace Railken\Laravel\Core\Action\CsvReport\Exceptions;

class CsvReportNotFoundException extends CsvReportException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CSVREPORT_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
