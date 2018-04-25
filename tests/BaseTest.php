<?php

namespace Railken\LaraOre\Tests;

class BaseTest extends \Orchestra\Testbench\TestCase
{
    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
    }

    protected function getPackageProviders($app)
    {
        return [

            \Laravel\Passport\PassportServiceProvider::class,
            \Railken\LaraOre\CoreServiceProvider::class,
        ];
    }

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/..', '.env');
        $dotenv->load();

        parent::setUp();

        $this->artisan('migrate:refresh');
        $this->artisan('migrate');
        $this->artisan('passport:install');
        $this->artisan('db:seed', ['--class' => 'Railken\LaraOre\Resources\Seeds\UserSeeder']);

        $this->signIn();
    }

    public function testSignIn()
    {
        $response = $this->signIn();

        if ($response->getStatusCode() === 500) {
            print_r($response->getContent());
        }

        $response->assertStatus(200);
    }

    public function signIn()
    {
        $response = $this->post('/api/v1/sign-in', [
            'username' => 'admin@admin.com',
            'password' => 'vercingetorige',
        ]);

        $access_token = $response->getContent();
        $access_token = json_decode($response->getContent())->data->access_token;

        $this->withHeaders(['Authorization' => 'Bearer '.$access_token]);

        return $response;
    }

    public function commonTest($params)
    {

        # GET /
        $response = $this->get($this->getBaseUrl(), []);
        $response->assertStatus(200);

        # POST /
        $response = $this->post($this->getBaseUrl(), $this->getParameters()->toArray());
        $response->assertStatus(200);

        $resource = json_decode($response->getContent())->resource;

        foreach ($params as $param) {  
            $p = $resource->$param;

            if (is_object($p)) {
                $p = (array)$p;
            }

            $this->assertEquals($this->getParameters()->get($param), $p);
        }
        
        # GET /id
        $response = $this->get($this->getBaseUrl() . "/". $resource->id);
        $response->assertStatus(200);

        # PUT /id
        $response = $this->put($this->getBaseUrl() . "/". $resource->id, $this->getParameters()->set('enabled', 0)->toArray());
        $resource = json_decode($response->getContent())->resource;
        $response->assertStatus(200);
        $this->assertEquals(0, $resource->enabled);

        # DELETE /id
        $response = $this->delete($this->getBaseUrl() . "/". $resource->id);
        $response->assertStatus(200);
        $response = $this->get($this->getBaseUrl() . "/". $resource->id);
        $response->assertStatus(404);

    }
}
