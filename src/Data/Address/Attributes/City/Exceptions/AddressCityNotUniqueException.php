<?php

namespace Railken\Laravel\Core\Data\Address\Attributes\City\Exceptions;

use Railken\Laravel\Core\Data\Address\Exceptions\AddressAttributeException;

class AddressCityNotUniqueException extends AddressAttributeException
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
    protected $code = 'ADDRESS_CITY_NOT_UNIQUE';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not unique";
}
