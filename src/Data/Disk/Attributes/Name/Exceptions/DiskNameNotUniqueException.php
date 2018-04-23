<?php

namespace Railken\Laravel\Core\Data\Disk\Attributes\Name\Exceptions;

use Railken\Laravel\Core\Data\Disk\Exceptions\DiskAttributeException;

class DiskNameNotUniqueException extends DiskAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'name';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'DISK_NAME_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
