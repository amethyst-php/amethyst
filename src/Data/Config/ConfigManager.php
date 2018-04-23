<?php

namespace Railken\Laravel\Core\Data\Config;

use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\Tokens;
use Railken\Laravel\Manager\ResultAction;

class ConfigManager extends ModelManager
{
    /**
     * List of all attributes.
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\Key\KeyAttribute::class,
        Attributes\Value\ValueAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
    ];

    /**
     * List of all exceptions.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\ConfigNotAuthorizedException::class,
    ];

    /**
     * Construct.
     *
     * @param AgentContract $agent
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new ConfigRepository($this));
        $this->setSerializer(new ConfigSerializer($this));
        $this->setValidator(new ConfigValidator($this));
        $this->setAuthorizer(new ConfigAuthorizer($this));

        parent::__construct($agent);
    }

    /**
     * massive
     */
    public function massive($params)
    {
        $result = new ResultAction();

        foreach ($params as $key => $value) {
            $config = $this->getRepository()->newQuery()->where('key', $key)->first();

            $result = $config ? $this->update($config, ['value' => $value]) : $this->create(['key' => $key, 'value' => $value]);

            $result->addErrors($result->getErrors());
        }

        return $result;
    }
}
