<?php

namespace Railken\LaraOre\Api\Support\Exceptions;

use Exception;

class InvalidSorterDirectionException extends Exception
{
    public function __construct($direction)
    {
        $this->message = sprintf("Invalid value '%s', expected: 'asc', 'desc'", $direction);

        parent::__construct();
    }
}
