<?php

namespace Railken\LaraOre\Action\CsvReport\Attributes\UpdatedAt\Exceptions;

use Railken\LaraOre\Action\CsvReport\Exceptions\CsvReportAttributeException;

class CsvReportUpdatedAtNotAuthorizedException extends CsvReportAttributeException
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
    protected $code = 'CSVREPORT_UPDATED_AT_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
