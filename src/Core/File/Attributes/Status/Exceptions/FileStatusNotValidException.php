<?php

namespace Railken\LaraOre\Core\File\Attributes\Status\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FileStatusNotValidException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'status';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_STATUS_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
