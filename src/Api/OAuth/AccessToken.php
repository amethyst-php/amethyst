<?php

namespace Railken\LaraOre\Api\OAuth;

use Laravel\Passport\Token as Model;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use League\OAuth2\Server\CryptKey;

/**
 * @property public $client
 * @property public $id
 * @property public $expires_at
 * @property public $user
 * @property public $scopes
 */
class AccessToken extends Model
{
    /**
     * Generate a JWT from the access token.
     *
     * @param CryptKey $privateKey
     *
     * @return string
     */
    public function convertToJWT(CryptKey $privateKey)
    {
        return (new Builder())
            ->setAudience($this->client->id)
            ->setId($this->id, true)
            ->setIssuedAt(time())
            ->setNotBefore(time())
            ->setExpiration($this->expires_at->getTimestamp())
            ->setSubject($this->user->id)
            ->set('scopes', $this->scopes)
            ->sign(new Sha256(), new Key($privateKey->getKeyPath(), $privateKey->getPassPhrase()))
            ->getToken();
    }
}
