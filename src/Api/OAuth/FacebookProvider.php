<?php

namespace Railken\LaraOre\Api\OAuth;

use Illuminate\Http\Request;

class FacebookProvider extends Provider
{
    /**
     * Name.
     *
     * @var string
     */
    protected $name = 'facebook';

    /**
     * URL.
     *
     * @var string
     */
    protected $url = 'https://graph.facebook.com/v2.9';

    /**
     * Construct.
     */
    public function __construct()
    {
    }

    /**
     * Issue access token.
     *
     * @return array
     */
    public function issueAccessToken(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        try {
            $params = [
                'query' => [
                    'client_id'     => $request->input('client_id'),
                    'client_secret' => $request->input('client_secret'),
                    'redirect_uri'  => $request->input('redirect_uri'),
                    'code'          => $request->input('code'),
                ],
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ];

            $response = $client->request('GET', $this->url.'/oauth/access_token', $params);
        } catch (\Exception $e) {
            throw $e;
        }

        $body = json_decode($response->getBody());

        return $body;
    }

    /**
     * Retrieve User.
     *
     * @return array
     */
    public function getUser($token)
    {
        $client = new \GuzzleHttp\Client();
        $user = new \stdClass();

        try {
            $response = $client->request('GET', $this->url.'/me', [
                'query' => [
                    'fields'       => 'id,name,email,first_name,last_name',
                    'access_token' => $token,
                ],
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => "token {$token}",
                ],
                'http_errors' => false,
            ]);

            $body = json_decode($response->getBody());
        } catch (\Exception $e) {
            throw $e;
        }

        if (!isset($body->email)) {
            throw new Exceptions\EmailNotFoundException();
        }

        $user->name = $body->first_name;
        $user->email = $body->email;

        $user->id = $body->id;

        $user->avatar = "{$this->url}/{$user->id}/picture";

        return $user;
    }
}
