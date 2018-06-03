<?php

namespace Railken\LaraOre\Api\Http\Controllers\Traits\ManyToMany;

use Illuminate\Http\Request;

trait RestRemoveTrait
{

    /**
     * Display a resource
     *
     * @param integer $id
     * @param \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function remove($id, Request $request)
    {
        $resource = $this->manager->getRepository()->findOneById($id);

        if (!$resource) {
            return $this->not_found();
        }
        
        $before = $this->manager->serializer->serialize($resource)->toArray();

        $result = $this->manager->remove($resource);


        if ($result->ok()) {
            return $this->success(['message' => 'ok']);
        }
    
        return $this->error(['errors' => $result->getSimpleErrors()]);
    }
}
