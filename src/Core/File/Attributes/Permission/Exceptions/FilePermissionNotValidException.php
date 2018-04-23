<?php

namespace Railken\LaraOre\Core\File\Attributes\Permission\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FilePermissionNotValidException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'permission';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_PERMISSION_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
