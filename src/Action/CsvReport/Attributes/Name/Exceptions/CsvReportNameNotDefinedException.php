<?php

namespace Railken\Laravel\Core\Action\CsvReport\Attributes\Name\Exceptions;

use Railken\Laravel\Core\Action\CsvReport\Exceptions\CsvReportAttributeException;

class CsvReportNameNotDefinedException extends CsvReportAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'name';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CSVREPORT_NAME_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
