<?php

namespace Railken\Laravel\Core\Data\File\Attributes\Name\Exceptions;

use Railken\Laravel\Core\Data\File\Exceptions\FileAttributeException;

class FileNameNotAuthorizedException extends FileAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'name';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_NAME_NOT_AUTHTORIZED';
    
    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
