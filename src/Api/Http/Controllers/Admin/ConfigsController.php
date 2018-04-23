<?php
namespace Railken\LaraOre\Api\Http\Controllers\Admin;

use Railken\LaraOre\Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Railken\LaraOre\Core\Config\ConfigManager;
use Railken\LaraOre\Api\Http\Controllers\Traits as RestTraits;
use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\Bag;

class ConfigsController extends RestController
{
    use RestTraits\RestIndexTrait;
    use RestTraits\RestCreateTrait;

    protected static $query = [
        'id',
        'key',
        'value',
        'created_at',
        'updated_at',
    ];

    protected static $fillable = [
        'key',
        'value',
    ];

    /**
     * Construct
     *
     */
    public function __construct(ConfigManager $manager)
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



    /**
     * Create a resource
     *
     * @param integer $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $params = new Bag($request->all());

        
        $params = $params->only(['mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption', 'mail_from_name', 'mail_from_address']);

        $result = $this->manager->massive($params);

        if ($result->ok()) {

            /*$m = new \Railken\LaraOre\Core\Log\LogManager();
            $m->create([
                'type' => 'api',
                'category' => 'update',
                'message' => null,
                'vars' => [
                    'entity_class' => $this->manager->getRepository()->getEntity(),
                    'entity_id' => $result->getResource()->id,
                    'before' => $before,
                    'after' => $this->manager->serializer->serialize($result->getResource())->toArray(),
                    'user_id' => $this->getUser()->id
                ]
            ]);*/

            return $this->success(['message' => 'ok']);
        }

        return $this->error([
            'errors' => $result->getSimpleErrors()
        ]);
    }
}
