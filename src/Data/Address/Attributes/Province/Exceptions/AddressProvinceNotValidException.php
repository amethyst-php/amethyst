<?php

namespace Railken\Laravel\Core\Data\Address\Attributes\Province\Exceptions;

use Railken\Laravel\Core\Data\Address\Exceptions\AddressAttributeException;

class AddressProvinceNotValidException extends AddressAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'province';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'ADDRESS_PROVINCE_NOT_VALID';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not valid";
}
