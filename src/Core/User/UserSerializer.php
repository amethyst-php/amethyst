<?php

namespace Railken\LaraOre\Core\User;

use Illuminate\Support\Collection;
use Laravolt\Avatar\Avatar;
use Railken\Bag;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\ModelSerializer;
use Railken\Laravel\Manager\Tokens;

class UserSerializer extends ModelSerializer
{
    /**
     * Serialize entity.
     *
     * @param EntityContract $entity
     * @param Collection     $select
     *
     * @return array
     */
    public function serialize(EntityContract $entity, Collection $select = null)
    {
        $bag = new Bag($entity->toArray());

        if ($select) {
            $bag = $bag->only($select->toArray());
        }

        $bag = $bag->only($this->manager->authorizer->getAuthorizedAttributes(Tokens::PERMISSION_SHOW, $entity)->keys()->toArray());

        $bag->set('avatar', (new Avatar())->create($entity->name)->toBase64()->getEncoded());
        $bag->set('notifications', $entity->unreadNotifications);

        return $bag;
    }
}
