<?php

namespace Railken\LaraOre\Api\Http\Controllers\Traits\ManyToMany;

use Illuminate\Http\Request;
use Railken\Bag;

trait RestCreateTrait
{


    /**
     * Create a new resource
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function onCreate(Request $request)
    {
        return new Bag($request->all());
    }

    /**
     * Create a new resource
     *
     * @param string $container_id
     * @param \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function create(string $container_id, Request $request)
    {
        $container = $this->managers->container;
        
        if (!$resource_container = $this->managers->container->getRepository()->findOneById($container_id)) {
            return $this->not_found();
        }

        $manager = $this->managers->data;

        $parameters = $this->onCreate($request);

        $result = $manager->create($parameters->only($this->keys->fillable));

        if ($result->ok()) {
            $resource = $result->getResource();

            $this->attach($resource_container, $resource);

            return $this->success([
                'resource' => $manager->serializer->serialize($result->getResource(), $this->keys->selectable)->all()
            ]);
        }
        
        return $this->error([
            'errors' => $result->getSimpleErrors()
        ]);
    }
}
