<?php

namespace Railken\Laravel\Core\Data\Config\Attributes\DeletedAt\Exceptions;

use Railken\Laravel\Core\Data\Config\Exceptions\ConfigAttributeException;

class ConfigDeletedAtNotDefinedException extends ConfigAttributeException
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
    protected $code = 'CONFIG_DELETED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
