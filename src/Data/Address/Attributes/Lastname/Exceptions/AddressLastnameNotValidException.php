<?php

namespace Railken\Laravel\Core\Data\Address\Attributes\Lastname\Exceptions;

use Railken\Laravel\Core\Data\Address\Exceptions\AddressAttributeException;

class AddressLastnameNotValidException extends AddressAttributeException
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
    protected $code = 'ADDRESS_LASTNAME_NOT_VALID';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not valid';
}
