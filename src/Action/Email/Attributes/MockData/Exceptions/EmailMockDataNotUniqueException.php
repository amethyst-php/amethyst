<?php

namespace Railken\LaraOre\Action\Email\Attributes\MockData\Exceptions;

use Core\Email\Exceptions\EmailAttributeException;

class EmailMockDataNotUniqueException extends EmailAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'mock_data';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'EMAIL_MOCK_DATA_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
