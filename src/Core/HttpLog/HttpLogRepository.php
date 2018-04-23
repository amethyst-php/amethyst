<?php

namespace Railken\LaraOre\Core\HttpLog;

use Railken\Laravel\Manager\ModelRepository;

class HttpLogRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = HttpLog::class;
}
