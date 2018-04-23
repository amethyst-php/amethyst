<?php

namespace Railken\Laravel\Core\Data\Disk\Attributes\Driver\Exceptions;

use Railken\Laravel\Core\Data\Disk\Exceptions\DiskAttributeException;

class DiskDriverNotDefinedException extends DiskAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'driver';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'DISK_DRIVER_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
