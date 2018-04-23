<?php

namespace Railken\LaraOre\Core\HttpLog;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class HttpLogAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'http_log.create',
        Tokens::PERMISSION_UPDATE => 'http_log.update',
        Tokens::PERMISSION_SHOW   => 'http_log.show',
        Tokens::PERMISSION_REMOVE => 'http_log.remove',
    ];
}
