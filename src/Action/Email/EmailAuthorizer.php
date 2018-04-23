<?php

namespace Railken\LaraOre\Action\Email;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class EmailAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'email.create',
        Tokens::PERMISSION_UPDATE => 'email.update',
        Tokens::PERMISSION_SHOW   => 'email.show',
        Tokens::PERMISSION_REMOVE => 'email.remove',
    ];
}
