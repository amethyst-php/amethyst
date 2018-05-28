<?php

namespace Railken\LaraOre\Permission;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = ['name'];
}
