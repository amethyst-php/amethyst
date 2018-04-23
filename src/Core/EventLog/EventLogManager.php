<?php

namespace Railken\LaraOre\Core\EventLog;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class EventLogManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class, 
        Attributes\EventClass\EventClassAttribute::class, 
        Attributes\Vars\VarsAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class, 
        Attributes\UpdatedAt\UpdatedAtAttribute::class, 
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\EventLogNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new EventLogRepository($this));
        $this->setSerializer(new EventLogSerializer($this));
        $this->setValidator(new EventLogValidator($this));
        $this->setAuthorizer(new EventLogAuthorizer($this));

        parent::__construct($agent);
    }
}
