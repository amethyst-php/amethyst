<?php

namespace Railken\Laravel\Core\Data\Disk;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class DiskAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'disk.create',
        Tokens::PERMISSION_UPDATE => 'disk.update',
        Tokens::PERMISSION_SHOW   => 'disk.show',
        Tokens::PERMISSION_REMOVE => 'disk.remove',
    ];
}
