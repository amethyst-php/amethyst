<?php

namespace Railken\Laravel\Core\Data\Notification;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class NotificationAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'notification.create',
        Tokens::PERMISSION_UPDATE => 'notification.update',
        Tokens::PERMISSION_SHOW   => 'notification.show',
        Tokens::PERMISSION_REMOVE => 'notification.remove',
    ];
}
