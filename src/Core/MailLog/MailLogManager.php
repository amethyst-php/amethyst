<?php

namespace Railken\LaraOre\Core\MailLog;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class MailLogManager extends ModelManager
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
        Attributes\DeletedAt\DeletedAtAttribute::class,
        Attributes\To\ToAttribute::class,
        Attributes\Body\BodyAttribute::class,
        Attributes\ToName\ToNameAttribute::class,
        Attributes\Sent\SentAttribute::class,
        Attributes\Subject\SubjectAttribute::class,
     ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\MailLogNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new MailLogRepository($this));
        $this->setSerializer(new MailLogSerializer($this));
        $this->setValidator(new MailLogValidator($this));
        $this->setAuthorizer(new MailLogAuthorizer($this));

        parent::__construct($agent);
    }
}
