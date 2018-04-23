<?php

namespace Railken\Laravel\Core\Data\File\Attributes\Access\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FileAccessNotAuthorizedException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'access';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_ACCESS_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
