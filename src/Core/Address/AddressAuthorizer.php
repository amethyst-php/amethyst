<?php

namespace Railken\LaraOre\Core\Address;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class AddressAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'address.create',
        Tokens::PERMISSION_UPDATE => 'address.update',
        Tokens::PERMISSION_SHOW   => 'address.show',
        Tokens::PERMISSION_REMOVE => 'address.remove',
    ];
}
