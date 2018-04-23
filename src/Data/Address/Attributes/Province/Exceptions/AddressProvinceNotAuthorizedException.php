<?php

namespace Railken\Laravel\Core\Data\Address\Attributes\Province\Exceptions;

use Railken\Laravel\Core\Data\Address\Exceptions\AddressAttributeException;

class AddressProvinceNotAuthorizedException extends AddressAttributeException
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
    protected $code = 'ADDRESS_PROVINCE_NOT_AUTHTORIZED';
    
    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
