<?php

namespace Railken\Laravel\Core\Data\File\Attributes\Ext\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FileExtNotUniqueException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'ext';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_EXT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
