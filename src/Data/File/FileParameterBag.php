<?php

namespace Railken\Laravel\Core\Data\File;

use Railken\Laravel\Manager\Contracts\ManagerContract;
use Railken\Laravel\Manager\ParameterBag;

class FileParameterBag extends ParameterBag
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
}
