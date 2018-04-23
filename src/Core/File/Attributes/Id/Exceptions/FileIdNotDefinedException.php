<?php

namespace Railken\LaraOre\Core\File\Attributes\Id\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

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
