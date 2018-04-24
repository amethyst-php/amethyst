<?php

namespace Railken\LaraOre\Core\File\Attributes\Path\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FilePathNotValidException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'path';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_PATH_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
