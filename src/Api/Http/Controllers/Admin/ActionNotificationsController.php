<?php

namespace Railken\LaraOre\Api\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Railken\LaraOre\Action\Notification\NotificationManager;
use Railken\LaraOre\Api\Http\Controllers\RestController;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestCreateTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestIndexTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestRemoveTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestShowTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestUpdateTrait;

class ActionNotificationsController extends RestController
{
    use RestIndexTrait;
    use RestShowTrait;
    use RestCreateTrait;
    use RestUpdateTrait;
    use RestRemoveTrait;

    /**
     * List of params that can be used to perform a search in the index.
     *
     * @var array
     */
    public static $query = [
        'id',
        'name',
        'targets',
        'description',
        'template',
        'mock_data',
        'created_at',
        'updated_at',
    ];

    /**
     * List of params that can be selected in the index.
     *
     * @var array
     */
    public static $fillable = [
        'name',
        'targets',
        'description',
        'template',
        'mock_data',
    ];

    public function __construct(NotificationManager $manager)
    {
        $this->manager = $manager;
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

    /**
     * Render a template.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function renderTemplate(Request $request)
    {
        $data = json_decode(base64_decode($request->input('data')));
        $template = $request->input('template');

        $filename = $this->manager->generateViewFile($template, $request->input('data'));

        $response = view($filename, (array) $data);

        return $this->success(['resource' => ['rendered' => $response->render()]]);
    }
}
