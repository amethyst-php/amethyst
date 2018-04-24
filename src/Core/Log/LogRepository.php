<?php

namespace Railken\LaraOre\Core\Log;

use Railken\Laravel\Manager\ModelRepository;

class LogRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Log::class;
}
