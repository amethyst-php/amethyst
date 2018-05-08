<?php

class AppTest extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/..', '.env');
        $dotenv->load();
        parent::setUp();
    } 

    protected function getPackageProviders($app)
    {
        return [
            \Laravel\Passport\PassportServiceProvider::class,
            \Railken\LaraOre\CoreServiceProvider::class,
            \Railken\LaraOre\Core\Listener\ListenerServiceProvider::class,
            \Railken\Laravel\Manager\ManagerServiceProvider::class,
            \Railken\Laravel\App\AppServiceProvider::class,
            \Barryvdh\DomPDF\ServiceProvider::class,
            \TwigBridge\ServiceProvider::class,
            \Zizaco\Entrust\EntrustServiceProvider::class,
        ];
    }

    /**
     * Retrieve app
     */
    public function getApp()
    {
    	return $this->app;
    }
}

$t = new AppTest();
$t->setUp();

return $t->getApp();

