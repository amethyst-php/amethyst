<?php

namespace Railken\LaraOre\Core\Disk\Exceptions;

class DiskNotFoundException extends DiskException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'DISK_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
