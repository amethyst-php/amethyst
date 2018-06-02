<?php

namespace Railken\LaraOre\Tests\Admin\Common;

use Railken\Laravel\Manager\Contracts\PolicyContract;
use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\Contracts\ManagerContract;

class PermissionPolicy implements PolicyContract
{
    /*
    public function newQuery(ManagerContract $manager, $query)
    {
    return $query;

    	$query->leftJoin('ownerships', function($join) {
    		$join->on('ownership.table_name', '=', $query->)
    	});

    if ($agent->hasRole('admin')) {
    	return $query;
    }

    if ($agent->hasRole('user')) {
    	return $query;
    }

    throw new \Exception("No role found for user: #".$agent->id);
    }
    */
}
