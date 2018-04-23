<?php

namespace Railken\LaraOre\Core\Config\Exceptions;

class ConfigNotAuthorizedException extends ConfigException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CONFIG_NOT_AUTHORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
