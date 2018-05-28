<?php

namespace Railken\LaraOre\Api\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait RestCreateTrait
{
    /**
     * Create a new resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $manager = $this->manager;

        $result = $manager->create($request->only($this->keys->fillable));

        if ($result->ok()) {
            /*$m = new \Railken\LaraOre\Core\Log\LogManager();
            $m->create([
                'type'     => 'api',
                'category' => 'create',
                'message'  => null,
                'vars'     => [
                    'entity_class' => $manager->getRepository()->getEntity(),
                    'entity_id'    => $result->getResource()->id,
                    'before'       => [],
                    'after'        => $manager->serializer->serialize($result->getResource())->toArray(),
                    'user_id'      => $this->getUser()->id,
                ],
            ]);*/

            return $this->success([
                'resource' => $manager->serializer->serialize($result->getResource(), $this->keys->selectable)->all(),
            ]);
        }

        return $this->error([
            'errors' => $result->getSimpleErrors(),
        ]);
    }
}
