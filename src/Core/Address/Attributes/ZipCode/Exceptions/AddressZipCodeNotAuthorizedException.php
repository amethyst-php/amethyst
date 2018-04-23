<?php

namespace Railken\LaraOre\Core\Address\Attributes\ZipCode\Exceptions;

use Railken\LaraOre\Core\Address\Exceptions\AddressAttributeException;

class AddressZipCodeNotAuthorizedException extends AddressAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'zip_code';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'ADDRESS_ZIP_CODE_NOT_AUTHTORIZED';
    
    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
