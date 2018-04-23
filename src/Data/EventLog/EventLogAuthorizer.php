<?php

namespace Railken\Laravel\Core\Data\EventLog;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class EventLogAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'event_log.create',
        Tokens::PERMISSION_UPDATE => 'event_log.update',
        Tokens::PERMISSION_SHOW   => 'event_log.show',
        Tokens::PERMISSION_REMOVE => 'event_log.remove',
    ];
}
