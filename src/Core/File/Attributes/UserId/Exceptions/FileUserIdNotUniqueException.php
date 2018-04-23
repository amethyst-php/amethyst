<?php

namespace Railken\LaraOre\Core\File\Attributes\UserId\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FileUserIdNotUniqueException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'user_id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_USER_ID_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
