<?php

namespace Railken\Laravel\Core\Data\Config\Attributes\UpdatedAt\Exceptions;

use Railken\Laravel\Core\Data\Config\Exceptions\ConfigAttributeException;

class ConfigUpdatedAtNotAuthorizedException extends ConfigAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'CONFIG_UPDATED_AT_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
