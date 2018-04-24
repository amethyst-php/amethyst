<?php

namespace Railken\LaraOre\Core\File;

use Railken\Laravel\Manager\ParameterBag;

class FileParameterBag extends ParameterBag
{
    /**
     * Filter current bag.
     *
     * @return $this
     */
    public function filterWrite()
    {
        return $this;
    }
}
