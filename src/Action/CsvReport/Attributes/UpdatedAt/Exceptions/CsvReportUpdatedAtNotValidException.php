<?php

namespace Railken\LaraOre\Action\CsvReport\Attributes\UpdatedAt\Exceptions;

use Railken\LaraOre\Action\CsvReport\Exceptions\CsvReportAttributeException;

class CsvReportUpdatedAtNotValidException extends CsvReportAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CSVREPORT_UPDATED_AT_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
