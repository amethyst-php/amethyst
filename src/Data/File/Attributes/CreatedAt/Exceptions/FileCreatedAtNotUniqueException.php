<?php

namespace Railken\Laravel\Core\Data\File\Attributes\CreatedAt\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FileCreatedAtNotUniqueException extends FileAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_CREATED_AT_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}
