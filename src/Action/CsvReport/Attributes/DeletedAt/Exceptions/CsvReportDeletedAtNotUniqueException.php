<?php

namespace Railken\Laravel\Core\Action\CsvReport\Attributes\DeletedAt\Exceptions;

use Railken\Laravel\Core\Action\CsvReport\Exceptions\CsvReportAttributeException;

class CsvReportDeletedAtNotUniqueException extends CsvReportAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'deleted_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CSVREPORT_DELETED_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
