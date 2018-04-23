<?php

namespace Railken\LaraOre\Action\CsvReport\Attributes\CreatedAt\Exceptions;

use Railken\LaraOre\Action\CsvReport\Exceptions\CsvReportAttributeException;

class CsvReportCreatedAtNotDefinedException extends CsvReportAttributeException
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
    protected $code = 'CSVREPORT_CREATED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
