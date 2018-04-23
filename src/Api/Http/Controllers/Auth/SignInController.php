<?php

namespace Railken\LaraOre\Api\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Railken\LaraOre\Api\Http\Controllers\Controller;
use Railken\LaraOre\Core\User\UserManager;
use Railken\LaraOre\Api\OAuth\GithubProvider;
use Railken\LaraOre\Api\OAuth\GitlabProvider;
use Railken\LaraOre\Api\OAuth\GoogleProvider;
use Railken\LaraOre\Api\OAuth\FacebookProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class SignInController extends Controller
{

    /**
     * @var UserManager
     */
    protected $manager;

    /**
     * Create a new controller instance.
     *
     * @param  \League\OAuth2\Server\AuthorizationServer  $server
     * @param  \Laravel\Passport\TokenRepository  $tokens
     * @param  \Lcobucci\JWT\Parser  $jwt
     * @return void
     */
    public function __construct(UserManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * List of all providers
     *
     * @var array
     */
    protected $providers = [
        'github' => GithubProvider::class,
        'gitlab' => GitlabProvider::class,
        'google' => GoogleProvider::class,
        'facebook' => FacebookProvider::class,
    ];

    /**
     * Get provider
     *
     * @param string $name
     *
     * @return \Railken\LaraOre\Api\Oauth\Provider
     */
    public function getProvider($name)
    {
        $class = isset($this->providers[$name]) ? $this->providers[$name] : null;

        if (!$class) {
            return null;
        }

        return new $class;
    }

    /**
     * Sign in a user
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function signIn(Request $request)
    {
        $oauth_client = DB::table('oauth_clients')->where('password_client', 1)->first();

        $request->request->add([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'scope' => '*',
            'grant_type' => 'password',
            'client_id' => $oauth_client->id,
            'client_secret' => $oauth_client->secret,
        ]);
        $request = Request::create('api/v1/oauth/token', 'POST', []);

        $response = Route::dispatch($request);

        $body = json_decode($response->getContent());

        if ($response->getStatusCode() === 200) {
            return $this->success(['data' => $body]);
        }

        if ($response->getStatusCode() === 401) {
            return $this->error(['code' => 'CREDENTIALS_NOT_VALID', 'message' => $body->error]);
        }

        if ($response->getStatusCode() === 500) {
            return $response;
        }

        throw new \Exception("Uhm...");

    }

    /**
     * Request token and generate a new one
     *
     * @param string $provider
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function accessToken($provider, Request $request)
    {
        $provider = $this->getProvider($provider);

        if (!$provider) {
            return $this->error([
                'code' => 'AUTH.PROVIDER.PROVIDER_NOT_FOUND',
                'message' => 'No provider found'
            ]);
        }

        try {
            $response = $provider->issueAccessToken($request);
            $access_token = $response->access_token;
        } catch (\Exception $e) {
            return $this->error([
                'code' => 'AUTH.PROVIDER.CODE_NOT_VALID',
                'message' => 'Code invalid or expired'
            ]);
        }

        return $this->success([
            'access_token' => $access_token,
            'provider' => $provider->getName(),
        ]);
    }

    /**
     * Serialize token
     *
     * @param \Railken\LaraOre\Api\OAuth\AccessToken $token
     *
     * @return array
     */
    public function serializeToken($token)
    {
        return [
            'access_token' => $token->accessToken,
            'token_type' => 'Bearer',
            'expire_in' => 0
        ];
    }

    /**
     * Request token and generate a new one
     *
     * @param string $provider
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function exchangeToken($provider, Request $request)
    {
        $provider = $this->getProvider($provider);

        if (!$provider) {
            return $this->error([
                'code' => 'AUTH.PROVIDER.PROVIDER_NOT_FOUND',
                'message' => 'No provider found'
            ]);
        }

        $access_token = $request->input('access_token');

        if (!$access_token) {
            return $this->error([
                "code" => "AUTH.PROVIDER.ACCESS_TOKEN_MISSING",
                "message" => "access_token is missing"
            ]);
        }

        try {
            $provider_user = $provider->getUser($access_token);
        } catch (\Railken\LaraOre\Api\OAuth\Exceptions\EmailNotFoundException $e) {
            return $this->error([
                'code' => 'AUTH.PROVIDER.EMAIL_NOT_FOUND',
                'message' => 'Email not found'
            ]);
        } catch (\Exception $e) {
            return $this->error([
                'code' => 'AUTH.PROVIDER.ACCESS_TOKEN_NOT_VALID',
                'message' => 'Token invalid or expired'
            ]);
        }

        $user = $this->manager->getRepository()->findOneByEmail($provider_user->email);

        if (!$user) {
            $result = $this->manager->create([
                'username' => $provider_user->username,
                'role' => 'user',
                'password' => sha1(str_random()),
                'avatar' => $provider_user->avatar,
                'email' => $provider_user->email
            ]);

            if (!$result->ok()) {
                return $this->error(['errors' => $result->getSimpleErrors()]);
            }

            $user = $result->getResource();

            $user->enabled = 1;
            $user->save();
        }

        $token = $user->createToken('login');

        return $this->success($this->serializeToken($token));
    }
}
