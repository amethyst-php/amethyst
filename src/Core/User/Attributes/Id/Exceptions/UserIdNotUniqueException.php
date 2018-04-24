<?php

namespace Railken\LaraOre\Core\User\Attributes\Id\Exceptions;

use Railken\LaraOre\Core\User\Exceptions\UserAttributeException;

class UserIdNotUniqueException extends UserAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'USER_ID_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
