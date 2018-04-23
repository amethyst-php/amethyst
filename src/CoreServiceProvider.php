<?php 

namespace Railken\Laravel\Core;

use Illuminate\Support\ServiceProvider;
use Railken\Laravel\App\Commands as Commands;
use Illuminate\Support\Facades\Schema;
use File;

class CoreServiceProvider extends ServiceProvider
{

    /**
     * The application instance.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    public $app;
    
    /**
     * Current version
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


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadRoutesFrom(__DIR__.'/Api/Resources/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/Resources/Migrations');

        Schema::defaultStringLength(191);

        if (Schema::hasTable('configs')) {
            $configs = (new \Railken\Laravel\Core\Data\Config\ConfigManager())->getRepository()->findToLoad();

            $configs = $configs->mapWithKeys(function($config, $key) {
                return [$config->resolveKey($config->key) => $config->value];
            })->toArray();

            config($configs);
        }


        if (Schema::hasTable('disks')) {

            $disks = (new \Railken\Laravel\Core\Data\Disk\DiskManager())->getRepository()->newQuery()->get();

            foreach ($disks as $disk) {

                if ($disk->config) {

                    $base = 'filesystems.disks';
                    $name = $disk->getConfigName();

                    config([$base . '.' . $name . '.driver' => $disk->driver]);

                    foreach ($disk->config as $key => $value) {
                        config([$base . '.' . $name . '.' . $key => $value]);
                    }
                }
            } 
        }

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