<?php

namespace Railken\LaraOre\Core\File\Attributes\ExpireAt\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FileExpireAtNotDefinedException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'expire_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_EXPIRE_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
