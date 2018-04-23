<?php

namespace Railken\LaraOre\Core\File\Attributes\Access\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FileAccessNotUniqueException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'access';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_ACCESS_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
