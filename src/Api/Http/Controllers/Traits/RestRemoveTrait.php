<?php

namespace Railken\Laravel\Core\Api\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Railken\Laravel\Core\Api\Helper\Paginator;
use Railken\Laravel\Core\Api\Helper\Filter;
use Railken\Laravel\Core\Api\Helper\Sorter;

use Railken\Laravel\Core\Api\Helper\Exceptions\FilterSyntaxException;

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
            $m = new \Core\Log\LogManager();
            $m->create([
                'type' => 'api',
                'category' => 'remove',
                'message' => null,
                'vars' => [
                    'entity_class' => $this->manager->getRepository()->getEntity(),
                    'entity_id' => $resource->id,
                    'before' => $before,
                    'after' => null,
                    'user_id' => $this->getUser()->id
                ]
            ]);

            return $this->success(['message' => 'ok']);
        }
    
        return $this->error(['errors' => $result->getSimpleErrors()]);
    }
}
