<?php

namespace Railken\LaraOre\Core\File\Attributes\Checksum\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FileChecksumNotUniqueException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'checksum';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_CHECKSUM_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
