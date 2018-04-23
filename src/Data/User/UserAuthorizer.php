<?php

namespace Railken\Laravel\Core\Data\User;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\ParameterBag;
use Railken\Laravel\Core\Data\User\Exceptions as Exceptions;
use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class UserAuthorizer extends ModelAuthorizer
{

    /**
     * List of all permissions
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'user.create',
        Tokens::PERMISSION_UPDATE => 'user.update',
        Tokens::PERMISSION_SHOW => 'user.show',
        Tokens::PERMISSION_REMOVE => 'user.remove',
    ];
}
