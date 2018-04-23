<?php

namespace Railken\LaraOre\Core\Log;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\ParameterBag;

class LogService
{

    /**
     * @var LogManager
     */
    public $manager;

    /**
     * Construct.
     */
    public function __construct()
    {
        $this->manager = new LogManager();
    }

    /**
     * Log
     *
     * @param string $type
     * @param string $category
     * @param string $message
     * @param object $vars
     * @param Log $log
     *
     * @return void
     */
    public function log($type, $category, $message, $vars = [], Log $parent = null)
    {
        $result = $this->manager->create([
            'type' => $type,
            'category' => $category,
            'message' => $message,
            'vars' => $vars
        ]);

        if ($parent) {
            $result->getResource()->parent()->associate($parent);
            $result->getResource()->save();
        }

        return $result->getResource();
    }
}
