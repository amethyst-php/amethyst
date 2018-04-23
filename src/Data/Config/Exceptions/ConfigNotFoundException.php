<?php

namespace Railken\Laravel\Core\Data\Config\Exceptions;

class ConfigNotFoundException extends ConfigException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CONFIG_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
