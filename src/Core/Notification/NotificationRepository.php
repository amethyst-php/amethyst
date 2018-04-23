<?php

namespace Railken\LaraOre\Core\Notification;

use Railken\Laravel\Manager\ModelRepository;

class NotificationRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Notification::class;
}
