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
            \Laravel\Passport\PassportServiceProvider::class,
            \Railken\LaraOre\CoreServiceProvider::class,
            \Railken\Laravel\Manager\ManagerServiceProvider::class,
            \Railken\LaraOre\UserServiceProvider::class,
            \Railken\LaraOre\Config\ConfigServiceProvider::class,
            \Zizaco\Entrust\EntrustServiceProvider::class,
            \Railken\LaraOre\RequestLogger\RequestLoggerServiceProvider::class,
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
