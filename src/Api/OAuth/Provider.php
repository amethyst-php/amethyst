<?php

namespace Railken\LaraOre\Api\OAuth;

abstract class Provider implements ProviderContract
{
    /**
     * Client ID.
     *
     * @var string
     */
    protected $client_id;

    /**
     * Client Secret.
     *
     * @var string
     */
    protected $client_secret;

    protected $name;

    public function getName()
    {
        return $this->name;
    }

    public function setClientId($client_id)
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function setClientSecret($client_secret)
    {
        $this->client_secret = $client_secret;

        return $this;
    }

    public function getClientId()
    {
        return $this->client_id;
    }

    public function getClientSecret()
    {
        return $this->client_secret;
    }
}
