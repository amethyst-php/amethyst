<?php

namespace Railken\Laravel\Core\Data\File\Attributes\Id\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FileIdNotDefinedException extends FileAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_ID_NOT_DEFINED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is required";
}
