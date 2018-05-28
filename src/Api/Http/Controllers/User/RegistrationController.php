<?php

namespace Railken\LaraOre\Api\Http\Controllers\User;

use Illuminate\Http\Request;
use Railken\LaraOre\Api\Http\Controllers\Controller;
use Railken\LaraOre\User\UserManager;

class RegistrationController extends Controller
{
    /**
     * Serialize token.
     *
     * @param \Railken\LaraOre\Api\OAuth\AccessToken $token
     *
     * @return array
     */
    public function serializeToken($token)
    {
        return [
            'access_token' => $token->accessToken,
            'token_type'   => 'Bearer',
            'expire_in'    => 0,
        ];
    }

    /**
     * Register a user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $um = new UserManager();

        $result = $um->register($request->all());

        $result->getErrors();

        if (!$result->ok()) {
            $errors = $result->getSimpleErrors();

            if ($request->header('Test', 0) === 'validate') {
                $errors = $errors->filter(function ($error) {
                    return strpos($error['code'], '_NOT_DEFINED') === false && $error['value'] !== null;
                });

                if (count($errors) === 0) {
                    return $this->success(['message' => 'ok']);
                }
            }

            return $this->error(['errors' => $errors]);
        }

        $user = $result->getResource();

        return $this->success([
            'code'    => 'USER_REGISTERED',
            'message' => 'ok',
        ]);
    }

    /**
     * Confirm email.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmEmail(Request $request)
    {
        $um = new UserManager();

        $user = $um->confirmEmail($request->input('token'));

        if (!$user) {
            return $this->error([
                'code'    => 'SIGNUP.CONFIRM_EMAIL_TOKEN_INVALID',
                'message' => 'Token invalid',
            ]);
        }

        $token = $user->createToken('login');

        return $this->success($this->serializeToken($token));
    }

    /**
     * Request Confirm email.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function requestConfirmEmail(Request $request)
    {
        $um = new UserManager();

        $user = $um->repository->findOneByEmail($request->input('email'));

        if ($user && !$user->enabled) {
            $um->requestConfirmEmail($user);
        }

        return $this->success(['message' => 'ok']);
    }
}
