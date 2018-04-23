<?php

namespace Railken\Laravel\Core\Data\Listener;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class ListenerAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'listener.create',
        Tokens::PERMISSION_UPDATE => 'listener.update',
        Tokens::PERMISSION_SHOW   => 'listener.show',
        Tokens::PERMISSION_REMOVE => 'listener.remove',
    ];
}
