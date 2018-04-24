<?php

namespace Railken\LaraOre\Core\Listener;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class ListenerManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Name\NameAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\Description\DescriptionAttribute::class,
        Attributes\EventClass\EventClassAttribute::class,
        Attributes\ActionType\ActionTypeAttribute::class,
        Attributes\ActionId\ActionIdAttribute::class,
        Attributes\Enabled\EnabledAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\ListenerNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new ListenerRepository($this));
        $this->setSerializer(new ListenerSerializer($this));
        $this->setValidator(new ListenerValidator($this));
        $this->setAuthorizer(new ListenerAuthorizer($this));

        parent::__construct($agent);
    }
}
