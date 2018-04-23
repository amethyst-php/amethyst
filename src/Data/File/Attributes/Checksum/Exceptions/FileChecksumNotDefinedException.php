<?php

namespace Railken\Laravel\Core\Data\File\Attributes\Checksum\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FileChecksumNotDefinedException extends FileAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'checksum';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_CHECKSUM_NOT_DEFINED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is required";
}
