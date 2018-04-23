<?php

namespace Railken\Laravel\Core\Data\MailLog;

use Railken\Laravel\Manager\ModelRepository;

class MailLogRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = MailLog::class;
}
