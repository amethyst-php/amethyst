<?php

namespace Railken\Laravel\Core\Data\File\Attributes\Permission\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FilePermissionNotDefinedException extends FileAttributeException
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
    protected $code = 'FILE_PERMISSION_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
