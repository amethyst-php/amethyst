<?php

namespace Railken\Laravel\Core\Data\File\Attributes\ExpireAt\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FileExpireAtNotAuthorizedException extends FileAttributeException
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
    protected $code = 'FILE_EXPIRE_AT_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
