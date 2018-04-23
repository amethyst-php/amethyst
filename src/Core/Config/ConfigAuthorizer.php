<?php

namespace Railken\LaraOre\Core\Config;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class ConfigAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'config.create',
        Tokens::PERMISSION_UPDATE => 'config.update',
        Tokens::PERMISSION_SHOW   => 'config.show',
        Tokens::PERMISSION_REMOVE => 'config.remove',
    ];
}
