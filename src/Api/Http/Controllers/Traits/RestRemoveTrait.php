<?php

namespace Railken\LaraOre\Api\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait RestRemoveTrait
{
    /**
     * Display a resource.
     *
     * @param int                      $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
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
            /*$m = new \Railken\LaraOre\Core\Log\LogManager();
            $m->create([
                'type'     => 'api',
                'category' => 'remove',
                'message'  => null,
                'vars'     => [
                    'entity_class' => $this->manager->getRepository()->getEntity(),
                    'entity_id'    => $resource->id,
                    'before'       => $before,
                    'after'        => null,
                    'user_id'      => $this->getUser()->id,
                ],
            ]);*/

            return $this->success(['message' => 'ok']);
        }

        return $this->error(['errors' => $result->getSimpleErrors()]);
    }
}
