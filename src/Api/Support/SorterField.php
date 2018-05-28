<?php

namespace Railken\LaraOre\Api\Support;

class SorterField
{
    /**
     * Name of field.
     *
     * @var string
     */
    protected $name;

    /**
     * Name of field.
     *
     * @var string
     */
    protected $direction;

    /**
     * Construct.
     */
    public function __construct()
    {
    }

    /**
     * Set name of field.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = strtolower($name);

        return $this;
    }

    /**
     * Get name of field.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name of direction.
     *
     * @param string $direction
     *
     * @return $this
     */
    public function setDirection($direction)
    {
        $direction = strtolower($direction);

        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction.
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }
}
