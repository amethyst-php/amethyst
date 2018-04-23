<?php

namespace Railken\LaraOre\Core\File\Attributes\Access\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

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
