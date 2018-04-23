<?php

namespace Railken\LaraOre\Core\File;

use Railken\Laravel\Manager\ModelSerializer;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Illuminate\Support\Collection;
use Railken\Laravel\Manager\Tokens;
use Railken\Bag;
use Illuminate\Support\Facades\Storage;

class FileSerializer extends ModelSerializer
{

    /**
     * Serialize entity
     *
     * @param EntityContract $entity
     * @param Collection $select
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

        $storage = $entity->getStorage();


        if ($entity->access === 'private') {
            $bag->set('readable', $storage->temporaryUrl($bag->get('path'), (new \DateTime())->modify('+2 hours')));
        }

        if ($entity->access === 'public') {
            $bag->set('readable', $storage->url($bag->get('path')));
        }

        return $bag;
    }
}
