<?php

namespace Railken\LaraOre\Core\Log;

use Railken\Laravel\Manager\Contracts\ManagerContract;
use Railken\Laravel\Manager\ParameterBag;

class LogParameterBag extends ParameterBag
{

    /**
     * Filter current bag
     *
     * @return $this
     */
    public function filterWrite()
    {
        return $this;
    }

    /**
     * Filter current bag for a search
     *
     * @return $this
     */
    public function filterRead()
    {
        $this->filter(['id', 'name', 'created_at', 'updated_at']);

        return $this;
    }
}
