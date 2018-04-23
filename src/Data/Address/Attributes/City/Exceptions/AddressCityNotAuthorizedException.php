<?php

namespace Railken\Laravel\Core\Data\Address\Attributes\City\Exceptions;

use Railken\Laravel\Core\Data\Address\Exceptions\AddressAttributeException;

class AddressCityNotAuthorizedException extends AddressAttributeException
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
    protected $code = 'ADDRESS_CITY_NOT_AUTHTORIZED';
    
    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
