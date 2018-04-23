<?php

namespace Railken\LaraOre\Api\Http\Controllers;

use App\Http\Controllers\Controller as AppController;
use Core\Permission\UserAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends AppController
{
    /**
     * Return a JSON response with status success
     *
     * @param array $data
     * @param integer $code
     *
     * @return \Illuminate\Http\Response
     */
    public function success($data = [], $code = 200)
    {
        return response()->json(array_merge(['status' => 'success'], $data), $code);
    }

    /**
     * Return a JSON response with status error
     *
     * @param array $data
     * @param integer $code
     *
     * @return \Illuminate\Http\Response
     */
    public function error($data = [], $code = 400)
    {
        return response()->json(array_merge(['status' => 'error'], $data), $code);
    }

    /**
     * Return a JSON response with status error
     *
     * @param array $data
     * @param integer $code
     *
     * @return \Illuminate\Http\Response
     */
    public function not_found($data = [], $code = 404)
    {
        return response()->json(array_merge(['status' => 'error','message' => 'not found'], $data), $code);
    }

    /**
     * Return a JSON response
     *
     * @param array $data
     * @param integer $code
     *
     * @return \Illuminate\Http\Response
     */
    public function response($data = [], $code = 200)
    {
        return response()->json($data = [], $code);
    }

    /**
     * Return a view
     *
     * @param string $filename
     * @param array $data
     * @param integer $code
     *
     * @return \Illuminate\Http\Response
     */
    public function view($view, $data = [], $code = 200)
    {
        $content = view($view, $data);
        $response = response($content, $code);
        $response->header('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Retrieve user
     *
     * @return \Core\User\User
     */
    public function getUser()
    {
        return Auth::user();
    }
}
