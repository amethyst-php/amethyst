<?php

namespace Railken\LaraOre\Core\File;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class FileManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Type\TypeAttribute::class,
        Attributes\Path\PathAttribute::class,
        Attributes\Access\AccessAttribute::class,
        Attributes\DiskId\DiskIdAttribute::class,
        Attributes\Ext\ExtAttribute::class,
        Attributes\ContentType\ContentTypeAttribute::class,
        Attributes\Status\StatusAttribute::class,
        Attributes\UserId\UserIdAttribute::class,
        Attributes\Permission\PermissionAttribute::class,
        Attributes\ExpireAt\ExpireAtAttribute::class,
        Attributes\Content\ContentAttribute::class,
        Attributes\Checksum\ChecksumAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\DeletedAt\DeletedAtAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\FileNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new FileRepository($this));
        $this->setSerializer(new FileSerializer($this));
        $this->setAuthorizer(new FileAuthorizer($this));
        $this->setValidator(new FileValidator($this));

        parent::__construct($agent);
    }
}
