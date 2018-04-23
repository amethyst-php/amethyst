<?php

namespace Railken\Laravel\Core\Action\CsvReport\Attributes\Id\Exceptions;

use Railken\Laravel\Core\Action\CsvReport\Exceptions\CsvReportAttributeException;

class CsvReportIdNotAuthorizedException extends CsvReportAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CSVREPORT_ID_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
