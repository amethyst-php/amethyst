<?php

namespace Railken\LaraOre\Api\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Railken\LaraOre\Api\Helper\Paginator;
use Railken\LaraOre\Api\Helper\Filter;
use Railken\LaraOre\Api\Helper\Sorter;

use Railken\LaraOre\Api\Helper\Exceptions\FilterSyntaxException;

trait RestUpdateTrait
{

    /**
     * Display a resource
     *
     * @param integer $id
     * @param \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function update($id, Request $request)
    {
        $resource = $this->manager->getRepository()->findOneById($id);

        if (!$resource) {
            return $this->not_found();
        }

        $before = $this->manager->serializer->serialize($resource)->toArray();

        $params = $request->only($this->keys->fillable);


        $result = $this->manager->update($resource, $params);


        if ($result->ok()) {
            $m = new \Railken\LaraOre\Core\Log\LogManager();
            $m->create([
                'type' => 'api',
                'category' => 'update',
                'message' => null,
                'vars' => [
                    'entity_class' => $this->manager->getRepository()->getEntity(),
                    'entity_id' => $result->getResource()->id,
                    'before' => $before,
                    'after' => $this->manager->serializer->serialize($result->getResource())->toArray(),
                    'user_id' => $this->getUser()->id
                ]
            ]);

            return $this->success([
                'resource' => $this->manager->serializer->serialize($result->getResource(), $this->keys->selectable)->all()
            ]);
        }

        return $this->error([
            'errors' => $result->getSimpleErrors()
        ]);
    }
}
