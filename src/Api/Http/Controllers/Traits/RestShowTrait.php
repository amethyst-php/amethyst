<?php

namespace Railken\Laravel\Core\Api\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Railken\Laravel\Core\Api\Helper\Paginator;
use Railken\Laravel\Core\Api\Helper\Filter;
use Railken\Laravel\Core\Api\Helper\Sorter;

use Railken\Laravel\Core\Api\Helper\Exceptions\FilterSyntaxException;

trait RestShowTrait
{

    /**
     * Display a resource
     *
     * @param mixed $id
     * @param \Illuminate\Http\Request $request
     *
     * @return response
     */
    public function show($id, Request $request)
    {
        $resource = $this->manager->getRepository()->findOneById($id);

        if (!$resource) {
            return $this->not_found();
        }

        return $this->success([
            'resource' => $this->manager->serializer->serialize($resource, $this->keys->selectable)->all()
        ]);
    }
}
