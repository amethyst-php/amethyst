<?php

namespace Railken\Laravel\Core\Data\Disk\Attributes\DeletedAt\Exceptions;

use Railken\Laravel\Core\Data\Disk\Exceptions\DiskAttributeException;

class DiskDeletedAtNotUniqueException extends DiskAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'deleted_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'DISK_DELETED_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
