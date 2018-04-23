<?php

namespace Railken\Laravel\Core\Data\Config\Attributes\Value\Exceptions;

use Railken\Laravel\Core\Data\Config\Exceptions\ConfigAttributeException;

class ConfigValueNotUniqueException extends ConfigAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'value';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CONFIG_VALUE_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
