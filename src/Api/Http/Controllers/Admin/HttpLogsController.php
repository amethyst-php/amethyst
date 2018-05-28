<?php

namespace Railken\LaraOre\Api\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestIndexTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestRemoveTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestShowTrait;
use Railken\LaraOre\RequestLogger\RequestLog\RequestLogManager;

class HttpLogsController extends RestController
{
    use RestIndexTrait;
    use RestShowTrait;
    use RestRemoveTrait;

    /**
     * List of params that can be used to perform a search in the index.
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
     * List of params that can be selected in the index.
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

    public function __construct(RequestLogManager $manager)
    {
        $this->manager = $manager;
        $this->manager->setAgent($this->getUser());
        parent::__construct();
    }

    /**
     * Create a new instance for query.
     *
     * @return \Illuminate\DataBase\Query\Builder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }
}
