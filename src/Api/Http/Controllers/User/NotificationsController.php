<?php

namespace Railken\LaraOre\Api\Http\Controllers\User;

use Illuminate\Http\Request;
use Railken\LaraOre\Core\Notification\NotificationManager;

use Railken\LaraOre\Api\Http\Controllers\Traits\RestIndexTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestShowTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestCreateTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestUpdateTrait;
use Railken\LaraOre\Api\Http\Controllers\Traits\RestRemoveTrait;
use Railken\LaraOre\Api\Http\Controllers\RestController;

class NotificationsController extends RestController
{
    use RestIndexTrait;
    use RestRemoveTrait;

    /**
     * List of params that can be used to perform a search in the index
     *
     * @var array
     */
    public static $query = [
        'id',
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',
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
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',
        'created_at',
        'updated_at',
    ];

    public function __construct(NotificationManager $manager)
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
        return $this->manager->repository->getQuery()->where(['notifiable_type' => 'Core\User\User', 'notifiable_id' => $this->getUser()->id]);
    }


    /**
     * Mark a notification as read
     *
     * @param integer $id
     * @param \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function markAsRead($id, Request $request)
    {
        $resource = $this->manager->getRepository()->findOneById($id);

        if (!$resource && $resource->notifiable->id !== $this->getUser()->id) {
            return $this->not_found();
        }

        $resource->markAsRead();

        return $this->success([]);
    }

    /**
     * Mark a notification as unread
     *
     * @param integer $id
     * @param \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function markAsUnread($id, Request $request)
    {
        $resource = $this->manager->getRepository()->findOneById($id);

        if (!$resource && $resource->notifiable->id !== $this->getUser()->id) {
            return $this->not_found();
        }

        $resource->markAsUnread();
        
        return $this->success([]);
    }
}
