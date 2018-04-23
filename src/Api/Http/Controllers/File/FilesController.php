<?php

namespace Railken\LaraOre\Api\Http\Controllers\File;

use Railken\LaraOre\Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Railken\LaraOre\Core\File\FileManager;
use Railken\Bag;
use Illuminate\Support\Collection;

class FilesController extends Controller
{

    /**
     * @var \Core\File\FileManager
     */
    protected $manager;
    
    /**
     * Construct
     */
    public function __construct(FileManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Upload a file.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $manager = $this->manager;

        $params = new Bag($request->all());

        $result = $manager->create([
            'type' => $params->get('type', 'default'),
            'path' => $manager->upload($manager->decode('base64_decode', $params->get('content'))),
            'status' => 'pending'
        ]);

        if (!$result->ok()) {
            return $this->error(['errors' => $result->getSimpleErrors()]);
        }

        return $this->success(['resource' => $this->manager->serializer->serialize($result->getResource(), new Collection(['id', 'url', 'token', 'path', 'checksum']))->toArray()]);
    }

    /**
     * Retrieve a file.
     *
     * @param string $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id, Request $request)
    {
        $resource = $this->manager->getRepository()->findOneById($id);

        if (!$resource) {
            return $this->not_found();
        }

        return $this->success([
            'resource' => $this->manager->serializer->serialize($resource)->all()
        ]);
    }


    /**
     * Retrieve a file.
     *
     * @param string $token
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function remove($token, Request $request)
    {
    }
}
