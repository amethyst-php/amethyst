<?php

namespace Railken\LaraOre\Core\File\Attributes\Content\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FileContentNotDefinedException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'content';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_CONTENT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
