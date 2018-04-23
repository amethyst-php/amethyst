<?php

namespace Railken\LaraOre\Action\CsvReport\Attributes\Name\Exceptions;

use Railken\LaraOre\Action\CsvReport\Exceptions\CsvReportAttributeException;

class CsvReportNameNotValidException extends CsvReportAttributeException
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
    protected $code = 'CSVREPORT_NAME_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
