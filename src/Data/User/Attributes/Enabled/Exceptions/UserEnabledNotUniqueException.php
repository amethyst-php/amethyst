<?php

namespace Railken\Laravel\Core\Data\User\Attributes\Enabled\Exceptions;

use Railken\Laravel\Core\Data\User\Exceptions\UserAttributeException;

class UserEnabledNotUniqueException extends UserAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'enabled';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'USER_ENABLED_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
