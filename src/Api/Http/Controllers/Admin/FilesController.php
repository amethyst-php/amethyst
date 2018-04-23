<?php
namespace Railken\LaraOre\Api\Http\Controllers\Admin;

use Railken\LaraOre\Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Railken\LaraOre\Core\File\FileManager;
use Railken\LaraOre\Api\Http\Controllers\Traits as RestTraits;
use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\Bag;
use Illuminate\Support\Collection;

class FilesController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestShowTrait;
    use RestTraits\RestRemoveTrait;


    protected static $query = [
        'id',
        'disk_id',
        'type',
        'path',
        'status',
        'checksum',
        'permission',
        'access',
        'user_id',
        'expire_at',
        'created_at',
        'updated_at'
    ];

    protected static $fillable = [
        'disk_id',
        'type',
        'path',
        'status',
        'checksum',
        'permission',
        'access',
        'user_id',
        'expire_at',
    ];

    /**
     * Construct
     *
     */
    public function __construct(FileManager $manager)
    {
        $this->manager = $manager;
        parent::__construct();
    }


    /**
     * Upload a file.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $manager = $this->manager;

        $params = new Bag($request->all());

        $result = $manager->create([
            'disk_id' => $params->get('disk_id'),
            'content' => $params->get('content'),
            'type' => $params->get('type', 'default'),
            'expire_at' => $params->get('expire_at', null),
            'permission' => null,
            'access' => $params->get('access', 'private'),
            'status' => 'pending',
            'user' => $this->getUser(),
        ]);

        if (!$result->ok()) {
            return $this->error(['errors' => $result->getSimpleErrors()]);
        }

        return $this->success(['resource' => $this->manager->serializer->serialize($result->getResource(), $this->keys->selectable)->toArray()]);
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
