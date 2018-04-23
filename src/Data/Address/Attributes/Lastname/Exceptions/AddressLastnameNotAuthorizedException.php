<?php

namespace Railken\Laravel\Core\Data\Address\Attributes\Lastname\Exceptions;

use Railken\Laravel\Core\Data\Address\Exceptions\AddressAttributeException;

class AddressLastnameNotAuthorizedException extends AddressAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'lastname';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ADDRESS_LASTNAME_NOT_AUTHTORIZED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
