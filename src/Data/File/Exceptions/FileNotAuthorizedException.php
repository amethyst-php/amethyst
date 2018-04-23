<?php

namespace Railken\Laravel\Core\Data\File\Exceptions;

class FileNotAuthorizedException extends FileException
{

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'FILE_NOT_AUTHORIZED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
