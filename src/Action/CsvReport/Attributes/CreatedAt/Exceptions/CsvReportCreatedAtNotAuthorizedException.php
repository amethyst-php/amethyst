<?php

namespace Railken\Laravel\Core\Action\CsvReport\Attributes\CreatedAt\Exceptions;

use Railken\Laravel\Core\Action\CsvReport\Exceptions\CsvReportAttributeException;

class CsvReportCreatedAtNotAuthorizedException extends CsvReportAttributeException
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
    protected $code = 'CSVREPORT_CREATED_AT_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
