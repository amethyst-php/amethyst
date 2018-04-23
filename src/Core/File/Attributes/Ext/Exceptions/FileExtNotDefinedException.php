<?php

namespace Railken\LaraOre\Core\File\Attributes\Ext\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FileExtNotDefinedException extends FileAttributeException
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
    protected $code = 'FILE_EXT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
