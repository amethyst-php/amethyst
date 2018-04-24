<?php

namespace Railken\LaraOre\Core\Address\Attributes\City\Exceptions;

use Railken\LaraOre\Core\Address\Exceptions\AddressAttributeException;

class AddressCityNotDefinedException extends AddressAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'city';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ADDRESS_CITY_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
