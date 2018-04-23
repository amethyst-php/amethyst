<?php

namespace Railken\Laravel\Core\Data\Address\Attributes\Id\Exceptions;

use Railken\Laravel\Core\Data\Address\Exceptions\AddressAttributeException;

class AddressIdNotValidException extends AddressAttributeException
{

    /**
     * The reason (attribute) for which this exception is thrown
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'ADDRESS_ID_NOT_VALID';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "The %s is not valid";
}
