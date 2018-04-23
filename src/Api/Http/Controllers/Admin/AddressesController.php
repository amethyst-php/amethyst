<?php
namespace Railken\Laravel\Core\Api\Http\Controllers\Admin;

use Railken\Laravel\Core\Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Core\Address\AddressManager;
use Railken\Laravel\Core\Api\Http\Controllers\Traits as RestTraits;
use Railken\Laravel\Core\Api\Http\Controllers\RestController;

class AddressesController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestCreateTrait;
    use RestTraits\RestUpdateTrait;
    use RestTraits\RestRemoveTrait;


    protected static $query = [
        'id',
        'street',
        'city',
        'country',
        'province',
        'zip_code',
        'firstname',
        'lastname',
        'created_at',
        'updated_at'
    ];

    protected static $fillable = [
        'street',
        'city',
        'country',
        'province',
        'zip_code',
        'firstname',
        'lastname',
    ];

    /**
     * Construct
     *
     */
    public function __construct(AddressManager $manager)
    {
        $this->manager = $manager;
        parent::__construct();
    }


    /**
     * Create a new instance for query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function getQuery()
    {
        return $this->manager->repository->getQuery();
    }
}
