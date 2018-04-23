<?php

namespace Railken\Laravel\Core\Data\File\Attributes\Status\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FileStatusNotUniqueException extends FileAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'status';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_STATUS_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}
