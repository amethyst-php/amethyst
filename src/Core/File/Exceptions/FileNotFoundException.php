<?php

namespace Railken\LaraOre\Core\File\Exceptions;

class FileNotFoundException extends FileException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'FILE_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
