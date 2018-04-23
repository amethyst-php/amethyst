<?php

namespace Railken\LaraOre\Core\Disk\Exceptions;

class DiskNotAuthorizedException extends DiskException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'DISK_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
