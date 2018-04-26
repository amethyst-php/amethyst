<?php

namespace Railken\LaraOre\Tests;

use Railken\Bag;
use Railken\LaraOre\Core\Disk\DiskManager;

/**
 * Testing disk
 * Attributes to fill are: name, driver, enabled, config.
 */
class DiskTest extends BaseTest
{
    use Traits\ApiTestCommonTrait;
    
    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return '/api/v1/admin/disks';
    }

    /**
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new DiskManager();
    }

    /**
     * Retrieve correct bag of parameters.
     *
     * @return Bag
     */
    public function getParameters($driver = "s3")
    {

        $drivers = [
            'local' => [
                'url'           => 'http://localhost:8000',
                'visibility'    => 'public',
                'root'          => 'var/cache',
            ],
            's3' => [
                'key'           => env('TEST_DISK_DRIVER_S3_KEY'),
                'secret'        => env('TEST_DISK_DRIVER_S3_SECRET'),
                'bucket'         => env('TEST_DISK_DRIVER_S3_BUCKET'),
                'region'        => env('TEST_DISK_DRIVER_S3_REGION'),
                'url'           => env('TEST_DISK_DRIVER_S3_URL'),

            ],

        ];

        $bag = new bag();
        $bag->set('driver', $driver);
        $bag->set('name', 'a common name');
        $bag->set('enabled', 1);
        $bag->set('config', $drivers[$driver]);

        return $bag;
    }

    public function testSuccessCommon()
    {
        $this->commonTest(['driver', 'name', 'enabled', 'config']);
    }

    public function testWrongCreate()
    {
        $response = $this->post($this->getBaseUrl(), []);
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'DISK_DRIVER_NOT_DEFINED'],
                ['code' => 'DISK_NAME_NOT_DEFINED'],
                ['code' => 'DISK_ENABLED_NOT_DEFINED'],
            ],
        ]);
    }

    public function testWrongDriver()
    {
        $response = $this->post($this->getBaseUrl(), $this->getParameters()->set('driver', 'wrong')->toArray());
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'DISK_DRIVER_NOT_VALID'],
            ],
        ]);
    }

    public function testWrongEnabled()
    {
        $response = $this->post($this->getBaseUrl(), $this->getParameters()->set('enabled', '2')->toArray());
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'DISK_ENABLED_NOT_VALID'],
            ],
        ]);

        $response = $this->post($this->getBaseUrl(), $this->getParameters()->set('enabled', 'A')->toArray());
        $response->assertJson([
            'errors' => [
                ['code' => 'DISK_ENABLED_NOT_VALID'],
            ],
        ]);
    }

    public function testWrongConfig()
    {
        $response = $this->post($this->getBaseUrl(), $this->getParameters()->set('config', ['random' => 'a'])->toArray());
        $response->assertJson([
            'errors' => [
                ['code' => 'DISK_CONFIG_NOT_VALID'],
            ],
        ]);
    }
}
