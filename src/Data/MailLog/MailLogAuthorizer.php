<?php

namespace Railken\Laravel\Core\Data\MailLog;

use Railken\Laravel\Manager\ModelAuthorizer;
use Railken\Laravel\Manager\Tokens;

class MailLogAuthorizer extends ModelAuthorizer
{
    /**
     * List of all permissions.
     *
     * @var array
     */
    protected $permissions = [
        Tokens::PERMISSION_CREATE => 'mail_log.create',
        Tokens::PERMISSION_UPDATE => 'mail_log.update',
        Tokens::PERMISSION_SHOW   => 'mail_log.show',
        Tokens::PERMISSION_REMOVE => 'mail_log.remove',
    ];
}
