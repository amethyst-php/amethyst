<?php

namespace Railken\LaraOre\Core\Config\Attributes\Key\Exceptions;

use Railken\LaraOre\Core\Config\Exceptions\ConfigAttributeException;

class ConfigKeyNotDefinedException extends ConfigAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'key';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CONFIG_KEY_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
