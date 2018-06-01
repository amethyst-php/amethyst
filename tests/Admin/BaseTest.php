<?php

namespace Railken\LaraOre\Tests\Admin;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler as BaseHandler;
use Illuminate\Support\Facades\File;

abstract class BaseTest extends \Orchestra\Testbench\TestCase
{
    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends BaseHandler {
            public function __construct()
            {
            }

            public function report(\Exception $e)
            {
                // no-op
            }

            public function render($request, \Exception $e)
            {
                throw $e;
            }
        });
    }

    protected function getPackageProviders($app)
    {
        return [
            \Railken\LaraOre\CoreServiceProvider::class,
        ];
    }

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/../..', '.env');
        $dotenv->load();

        parent::setUp();

        File::cleanDirectory(database_path("migrations/"));

        $this->artisan('lara-ore:install');

        $this->artisan('migrate:fresh');
        $this->artisan('migrate', ['--force' => true]);

        $this->artisan('lara-ore:seed');

        (new \Railken\LaraOre\User\UserManager())->getRepository()->findOneBy(['id' => 1])->attachRole(\Railken\LaraOre\Permission\Role::where('name', 'admin')->first());

        $this->signIn();
        $this->disableExceptionHandling();
    }

    public function signIn()
    {
        $response = $this->post('/api/v1/sign-in', [
            'username' => 'admin@admin.com',
            'password' => 'vercingetorige',
        ]);

        $access_token = json_decode($response->getContent())->data->access_token;

        $this->withHeaders(['Authorization' => 'Bearer '.$access_token]);

        return $response;
    }
}
