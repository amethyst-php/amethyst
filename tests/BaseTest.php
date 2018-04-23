<?php

namespace Railken\Laravel\ApiHelpers\Tests;

use Railken\Laravel\ApiHelpers\Filter;
use Railken\Laravel\ApiHelpers\Paginator;
use Railken\Laravel\ApiHelpers\Sorter;

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
            \Railken\Laravel\Core\CoreServiceProvider::class
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
        $this->artisan('db:seed', ['--class' => 'Railken\Laravel\Core\Resources\Seeds\UserSeeder']);

    }

    public function testSomething()
    {
        $this->assertEquals(1, 1);
    }

}
