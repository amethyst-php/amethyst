<?php

namespace Railken\LaraOre\Core\Address\Attributes\City\Exceptions;

use Railken\LaraOre\Core\Address\Exceptions\AddressAttributeException;

class AddressCityNotValidException extends AddressAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'city';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'ADDRESS_CITY_NOT_VALID';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not valid";
}
