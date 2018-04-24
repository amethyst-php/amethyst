<?php

namespace Railken\LaraOre\Api\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait RestShowTrait
{
    /**
     * Display a resource.
     *
     * @param mixed                    $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $resource = $this->manager->getRepository()->findOneById($id);

        if (!$resource) {
            return $this->not_found();
        }

        return $this->success([
            'resource' => $this->manager->serializer->serialize($resource, $this->keys->selectable)->all(),
        ]);
    }
}
