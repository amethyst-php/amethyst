<?php

namespace Railken\Laravel\Core\Data\File\Attributes\Access\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FileAccessNotValidException extends FileAttributeException
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
    protected $code = 'FILE_ACCESS_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
