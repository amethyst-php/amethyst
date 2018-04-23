<?php

namespace Railken\LaraOre\Core\Log;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\ParameterBag;
use Railken\LaraOre\Core\Log\Exceptions as Exceptions;
use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class LogAuthorizer extends ModelAuthorizer
{

    /**
     * List of all permissions
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'log.create',
        Tokens::PERMISSION_UPDATE => 'log.update',
        Tokens::PERMISSION_SHOW => 'log.show',
        Tokens::PERMISSION_REMOVE => 'log.remove',
    ];
}
