<?php

namespace Railken\LaraOre\Core\Config;

use Railken\Laravel\Manager\ModelRepository;

class ConfigRepository extends ModelRepository
{
    /**
     * Class name entity.
     *
     * @var string
     */
    public $entity = Config::class;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function findToLoad()
    {
    	return $this->newQuery()->whereNotNull('value')->get();
    }
}
