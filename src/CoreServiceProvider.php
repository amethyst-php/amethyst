<?php

namespace Railken\LaraOre;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Laravel\Passport\RouteRegistrar;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    public $app;

    /**
     * Current version.
     *
     * @var string
     */
    public $version;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Laravel\Passport\PassportServiceProvider::class);

        $this->app->register(\Railken\Laravel\Manager\ManagerServiceProvider::class);
        $this->app->register(\Railken\LaraOre\UserServiceProvider::class);
        $this->app->register(\Railken\LaraOre\ConfigServiceProvider::class);
        $this->app->register(\Railken\LaraOre\RequestLoggerServiceProvider::class);
        $this->app->register(\Railken\LaraOre\FileServiceProvider::class);
        $this->app->register(\Railken\LaraOre\DiskServiceProvider::class);
        $this->app->register(\Railken\LaraOre\WorkServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        $router->middleware([
            \Barryvdh\Cors\HandleCors::class,
            \Railken\LaraOre\RequestLoggerMiddleware::class
        ]);

        $this->commands([
            \Railken\LaraOre\Console\Commands\InstallCommand::class,
            \Railken\LaraOre\Console\Commands\SeedCommand::class
        ]);


        $router->aliasMiddleware('admin', \Railken\LaraOre\Api\Http\Middleware\AdminMiddleware::class);

        config(['auth.guards.api.driver' => 'passport']);
        config(['auth.guards.api.provider' => 'users']);
        config(['auth.providers.users.driver' => 'eloquent']);
        config(['auth.providers.users.model' => \Railken\LaraOre\User\User::class]);

        config(['ore.user.permission.managers' => [
            \Railken\LaraOre\User\UserManager::class,
            \Railken\LaraOre\Config\ConfigManager::class,
            \Railken\LaraOre\Work\WorkManager::class,
        ]]);



        $callback = function ($router) {
            $router->all();
        };

        $this->loadRoutesFrom(__DIR__.'/../routes/ore.php');
        $this->loadMigrationsFrom(__DIR__.'/Resources/Migrations');

        Schema::defaultStringLength(191);

        $options = array_merge([
            'namespace' => '\Laravel\Passport\Http\Controllers',
            'prefix'    => 'api/v1/oauth',
        ], []);

        Route::group($options, function ($router) use ($callback) {
            $callback(new RouteRegistrar($router));
        });

        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
