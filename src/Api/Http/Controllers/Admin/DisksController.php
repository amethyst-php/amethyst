<?php

namespace Railken\LaraOre\Api\Http\Controllers\Admin;

use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\LaraOre\Api\Http\Controllers\Traits as RestTraits;
use Railken\LaraOre\Disk\DiskManager;

class DisksController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestCreateTrait;
    use RestTraits\RestUpdateTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestRemoveTrait;

    protected static $query = [
        'id',
        'name',
        'enabled',
        'driver',
        'config',
        'created_at',
        'updated_at',
    ];

    protected static $fillable = [
        'name',
        'enabled',
        'driver',
        'config',
    ];

    /**
     * Construct.
     */
    public function __construct(DiskManager $manager)
    {
        $this->manager = $manager;
        $this->manager->setAgent($this->getUser());
        parent::__construct();
    }

    /**
     * Create a new instance for query.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }
}
