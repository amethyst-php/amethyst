<?php

namespace Railken\LaraOre\Core\Address;

use Illuminate\Support\Collection;
use Railken\Bag;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\ModelSerializer;
use Railken\Laravel\Manager\Tokens;

class AddressSerializer extends ModelSerializer
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

        // $bag = $bag->only($this->manager->authorizer->getAuthorizedAttributes(Tokens::PERMISSION_SHOW, $entity)->keys()->toArray());

        $bag->set('readable', $bag->get('street').' '.$bag->get('city').' ('.$bag->get('zip_code').') '.$bag->get('province'));

        return $bag;
    }
}
