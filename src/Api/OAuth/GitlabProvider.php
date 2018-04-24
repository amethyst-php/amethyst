<?php

namespace Railken\LaraOre\Api\OAuth;

use Illuminate\Http\Request;

class GitlabProvider extends Provider
{
    /**
     * Name.
     *
     * @var string
     */
    protected $name = 'gitlab';

    /**
     * URL.
     *
     * @var string
     */
    protected $url = 'https://gitlab.com/oauth';

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

        $params = [
            'form_params' => [
                'client_id'     => $request->input('client_id'),
                'client_secret' => $request->input('client_secret'),
                'code'          => $request->input('code'),
                'grant_type'    => 'authorization_code',
                'redirect_uri'  => $request->input('redirect_uri'),
            ],
            'headers' => [
                'Accept' => 'application/json',
            ],
        ];

        $response = $client->request('POST', $this->url.'/token', $params);

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

        $response = $client->request('GET', 'https://gitlab.com/api/v4/user', [
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => "Bearer {$token}",
            ],
            'http_errors' => false,
        ]);

        $body = json_decode($response->getBody());

        $user->firstname = $body->name;
        $user->lastname = $body->name;
        $user->avatar = $body->avatar_url;
        $user->email = $body->email;

        return $user;
    }
}
