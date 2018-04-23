<?php

namespace Railken\Laravel\Core\Data\Address\Exceptions;

class AddressNotAuthorizedException extends AddressException
{

    /**
     * The code to identify the error
     *
     * @var string
     */
    protected $code = 'ADDRESS_NOT_AUTHORIZED';

    /**
     * The message
     *
     * @var string
     */
    protected $message = "You're not authorized to interact with %s, missing %s permission";
}
