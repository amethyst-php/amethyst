<?php

namespace Railken\Laravel\Core\Data\File\Attributes\DeletedAt\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FileDeletedAtNotUniqueException extends FileAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'deleted_at';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_DELETED_AT_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}
