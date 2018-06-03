<?php

namespace Railken\LaraOre\Api\Http\Controllers\Traits\ManyToMany;

use Illuminate\Http\Request;

trait RestUpdateTrait
{

    /**
     * Display a resource
     *
     * @param integer $container_id
     * @param integer $id
     * @param \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function update($container_id, $id, Request $request)
    {
        $resource_container = $this->managers->container->getRepository()->findOneById($container_id);

        if (!$resource_container) {
            return $this->not_found();
        }

        $manager = $this->managers->data;

        $resource = $this->getQuerySingle($container_id, $id, $request);

        if (!$resource) {
            return $this->not_found();
        }


        $before = $manager->serializer->serialize($resource)->toArray();

        $params = $request->only($this->keys->fillable);


        $result = $manager->update($resource, $params);


        if ($result->ok()) {
            return $this->success([
                'resource' => $manager->serializer->serialize($result->getResource(), $this->keys->selectable)->all()
            ]);
        }

        return $this->error([
            'errors' => $result->getSimpleErrors()
        ]);
    }
}
