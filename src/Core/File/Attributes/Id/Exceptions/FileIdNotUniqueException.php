<?php

namespace Railken\LaraOre\Core\File\Attributes\Id\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FileIdNotUniqueException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_ID_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
