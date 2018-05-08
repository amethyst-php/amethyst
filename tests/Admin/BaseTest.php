<?php

namespace Railken\LaraOre\Tests\Admin;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler as BaseHandler;


abstract class BaseTest extends \Orchestra\Testbench\TestCase
{ 

    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends BaseHandler {
            public function __construct() {}

            public function report(\Exception $e)
            {
                // no-op
            }

            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }

    protected function getPackageAliases($app)
    {
        return [
            'Twig' => \TwigBridge\Facade\Twig::class,
        ];
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
     * Setup the test environment.
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(__DIR__.'/../..', '.env');
        $dotenv->load();

        parent::setUp();

        $this->artisan('migrate:fresh');
        $this->artisan('railken:lara-ore:flush-permissions', [
            'classes' => implode("," , [
                '\Railken\LaraOre\Core\User\UserManager',
                '\Railken\LaraOre\Core\Address\AddressManager',
                '\Railken\LaraOre\Core\Config\ConfigManager',
                '\Railken\LaraOre\Core\Disk\DiskManager',
                '\Railken\LaraOre\Core\EventLog\EventLogManager',
                '\Railken\LaraOre\Core\File\FileManager',
                '\Railken\LaraOre\Core\HttpLog\HttpLogManager',
                '\Railken\LaraOre\Core\Listener\ListenerManager',
                '\Railken\LaraOre\Core\Log\LogManager',
                '\Railken\LaraOre\Core\MailLog\MailLogManager',
                '\Railken\LaraOre\Core\Notification\NotificationManager',
                '\Railken\LaraOre\Action\Email\EmailManager',
                '\Railken\LaraOre\Action\Notification\NotificationManager',
                '\Railken\LaraOre\Report\Pdf\PdfManager',
            ])
        ]);
        $this->artisan('migrate');
        $this->artisan('passport:install');
        $this->artisan('db:seed', ['--class' => 'Railken\LaraOre\Resources\Seeds\UserSeeder']);

        $this->signIn();
        $this->disableExceptionHandling();
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
}
