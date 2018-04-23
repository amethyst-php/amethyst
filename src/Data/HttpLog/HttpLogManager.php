<?php

namespace Railken\Laravel\Core\Data\HttpLog;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class HttpLogManager extends ModelManager
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
        Attributes\DeletedAt\DeletedAtAttribute::class,
        Attributes\Url\UrlAttribute::class,
        Attributes\Type\TypeAttribute::class,
        Attributes\Method\MethodAttribute::class,
        Attributes\Category\CategoryAttribute::class,
        Attributes\Request\RequestAttribute::class,
        Attributes\Response\ResponseAttribute::class,
        Attributes\Ip\IpAttribute::class
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\HttpLogNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new HttpLogRepository($this));
        $this->setSerializer(new HttpLogSerializer($this));
        $this->setValidator(new HttpLogValidator($this));
        $this->setAuthorizer(new HttpLogAuthorizer($this));

        parent::__construct($agent);
    }
}
