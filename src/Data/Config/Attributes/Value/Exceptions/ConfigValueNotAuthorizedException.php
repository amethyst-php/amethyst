<?php

namespace Railken\Laravel\Core\Data\Config\Attributes\Value\Exceptions;

use Railken\Laravel\Core\Data\Config\Exceptions\ConfigAttributeException;

class ConfigValueNotAuthorizedException extends ConfigAttributeException
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
    protected $code = 'CONFIG_VALUE_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
