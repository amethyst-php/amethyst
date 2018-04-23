<?php

namespace Railken\Laravel\Core\Api\Http\Controllers\User;

use Railken\Laravel\Core\Api\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Core\User\UserManager;

class UserController extends Controller
{

    /**
     * @var \Core\User\UserManager
     */
    protected $manager;

    /**
     * Construct
     */
    public function __construct(UserManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Display current user
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
                    'created_at'
                ])
            )->all()
        ]);
    }
}
