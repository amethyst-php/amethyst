<?php

namespace Railken\LaraOre\Api\Http\Controllers\User;

use Illuminate\Http\Request;
use Railken\LaraOre\Api\Http\Controllers\Controller;
use Railken\LaraOre\User\UserManager;

class UserController extends Controller
{
    /**
     * @var \Railken\LaraOre\User\UserManager
     */
    protected $manager;

    /**
     * Construct.
     */
    public function __construct(UserManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Display current user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->initialize($request);
        return $this->success(['resource' => $this->manager->serializer->serialize(
            $this->getUser(),
                collect([
                    'id',
                    'avatar',
                    'name',
                    'email',
                    'password',
                    'created_at',
                ])
            )->all(),
        ]);
    }
}
