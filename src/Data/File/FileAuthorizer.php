<?php

namespace Railken\Laravel\Core\Data\File;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\ParameterBag;
use Railken\Laravel\Core\Data\File\Exceptions as Exceptions;
use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class FileAuthorizer extends ModelAuthorizer
{

    /**
     * List of all permissions
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'file.create',
        Tokens::PERMISSION_UPDATE => 'file.update',
        Tokens::PERMISSION_SHOW => 'file.show',
        Tokens::PERMISSION_REMOVE => 'file.remove',
    ];
}
