<?php

namespace Railken\LaraOre\Core\Notification;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class NotificationManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\Type\TypeAttribute::class,
        Attributes\NotifiableType\NotifiableTypeAttribute::class,
        Attributes\NotifiableId\NotifiableIdAttribute::class,
        Attributes\ReadAt\ReadAtAttribute::class,
        Attributes\Data\DataAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\NotificationNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new NotificationRepository($this));
        $this->setSerializer(new NotificationSerializer($this));
        $this->setValidator(new NotificationValidator($this));
        $this->setAuthorizer(new NotificationAuthorizer($this));

        parent::__construct($agent);
    }
}
