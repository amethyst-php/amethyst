<?php

namespace Railken\LaraOre\Action\CsvReport;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;

class CsvReportManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [Attributes\Id\IdAttribute::class, Attributes\Name\NameAttribute::class, Attributes\CreatedAt\CreatedAtAttribute::class, Attributes\UpdatedAt\UpdatedAtAttribute::class, Attributes\DeletedAt\DeletedAtAttribute::class];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\CsvReportNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new CsvReportRepository($this));
        $this->setSerializer(new CsvReportSerializer($this));
        $this->setValidator(new CsvReportValidator($this));
        $this->setAuthorizer(new CsvReportAuthorizer($this));

        parent::__construct($agent);
    }
}
