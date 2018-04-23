<?php

namespace Railken\Laravel\Core\Data\Address;

use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Contracts\AgentContract;
use Railken\Laravel\Manager\ModelManager;
use Railken\Laravel\Manager\ParameterBag;
use Railken\Laravel\Manager\Tokens;

class AddressManager extends ModelManager
{

    /**
     * List of all attributes
     *
     * @var array
     */
    protected $attributes = [
        Attributes\Id\IdAttribute::class,
        Attributes\City\CityAttribute::class,
        Attributes\Street\StreetAttribute::class,
        Attributes\ZipCode\ZipCodeAttribute::class,
        Attributes\Province\ProvinceAttribute::class,
        Attributes\Country\CountryAttribute::class,
        Attributes\CreatedAt\CreatedAtAttribute::class,
        Attributes\UpdatedAt\UpdatedAtAttribute::class,
        Attributes\Firstname\FirstnameAttribute::class,
        Attributes\Lastname\LastnameAttribute::class,
    ];

    /**
     * List of all exceptions
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_AUTHORIZED => Exceptions\AddressNotAuthorizedException::class
    ];

    /**
     * Construct
     *
     * @param AgentContract $agent
     *
     */
    public function __construct(AgentContract $agent = null)
    {
        $this->setRepository(new AddressRepository($this));
        $this->setSerializer(new AddressSerializer($this));
        $this->setAuthorizer(new AddressAuthorizer($this));
        $this->setValidator(new AddressValidator($this));

        parent::__construct($agent);
    }
}
