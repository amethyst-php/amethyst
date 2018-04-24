<?php

namespace Railken\LaraOre\Core\Disk;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class DiskManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Driver\DriverAttribute::class,
        Attributes\Name\NameAttribute::class,
        Attributes\Enabled\EnabledAttribute::class,
        Attributes\Config\ConfigAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\DiskNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new DiskRepository($this));
        $this->setSerializer(new DiskSerializer($this));
        $this->setValidator(new DiskValidator($this));
        $this->setAuthorizer(new DiskAuthorizer($this));

        parent::__construct($agent);
    }
}
