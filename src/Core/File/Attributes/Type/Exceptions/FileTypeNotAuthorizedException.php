<?php

namespace Railken\LaraOre\Core\File\Attributes\Type\Exceptions;

use Railken\LaraOre\Core\File\Exceptions\FileAttributeException;

class FileTypeNotAuthorizedException extends FileAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'type';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_TYPE_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
