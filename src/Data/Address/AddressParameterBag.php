<?php

namespace Railken\Laravel\Core\Data\Address;

use Railken\Laravel\Manager\Contracts\ManagerContract;
use Railken\Laravel\Manager\ParameterBag;

class AddressParameterBag extends ParameterBag
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
