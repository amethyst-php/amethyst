<?php

namespace Railken\LaraOre\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

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
            \Railken\LaraOre\CoreServiceProvider::class
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

    }

    public function testSomething()
    {
        $response = $this->post('/api/v1/sign-in', [
            'username' => 'admin@admin.com',
            'password' => 'vercingetorige',
        ]);

        $access_token = $response->getContent();

        if ($response->getStatusCode() === 500) {
            print_r($response->getContent());
        }

        $response->assertStatus(200);
        $access_token = json_decode($response->getContent())->data->access_token;

        print_r($access_token);

    }

}
