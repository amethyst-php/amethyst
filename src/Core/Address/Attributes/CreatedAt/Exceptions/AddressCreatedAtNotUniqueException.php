<?php

namespace Railken\LaraOre\Core\Address\Attributes\CreatedAt\Exceptions;

use Railken\LaraOre\Core\Address\Exceptions\AddressAttributeException;

class AddressCreatedAtNotUniqueException extends AddressAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'created_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ADDRESS_CREATED_AT_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
