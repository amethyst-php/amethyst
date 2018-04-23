<?php

namespace Railken\Laravel\Core\Api\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Core\HttpLog\HttpLogManager;

use Railken\Laravel\Core\Api\Http\Controllers\Traits\RestIndexTrait;
use Railken\Laravel\Core\Api\Http\Controllers\Traits\RestShowTrait;
use Railken\Laravel\Core\Api\Http\Controllers\Traits\RestCreateTrait;
use Railken\Laravel\Core\Api\Http\Controllers\Traits\RestUpdateTrait;
use Railken\Laravel\Core\Api\Http\Controllers\Traits\RestRemoveTrait;
use Railken\Laravel\Core\Api\Http\Controllers\RestController;

class HttpLogsController extends RestController
{
    use RestIndexTrait;
    use RestShowTrait;
    use RestRemoveTrait;

    /**
     * List of params that can be used to perform a search in the index
     *
     * @var array
     */
    public static $query = [
        'id',
        'url',
        'type',
        'method',
        'category',
        'request',
        'response',
        'ip',
        'created_at',
        'updated_at',
    ];

    /**
     * List of params that can be selected in the index
     *
     * @var array
     */
    public static $selectable = [
        'id',
        'url',
        'type',
        'method',
        'category',
        'request',
        'response',
        'ip',
        'created_at',
        'updated_at',
    ];

    public function __construct(HttpLogManager $manager)
    {
        $this->manager = $manager;
        parent::__construct();
    }

    /**
     * Create a new instance for query
     *
     * @return QueryBuilder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }
}
