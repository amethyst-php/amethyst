<?php

namespace Railken\Laravel\Core\Data\Address\Attributes\Country\Exceptions;

use Railken\Laravel\Core\Data\Address\Exceptions\AddressAttributeException;

class AddressCountryNotValidException extends AddressAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'country';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'ADDRESS_COUNTRY_NOT_VALID';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not valid";
}
