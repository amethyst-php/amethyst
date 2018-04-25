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
    public function getParameters()
    {
        $bag = new bag();
        $bag->set('driver', 'local');
        $bag->set('name', 'a common name');
        $bag->set('enabled', 1);
        $bag->set('config', [
            'url'        => 'http://localhost:8000',
            'visibility' => 'public',
            'root'       => '...',
        ]);

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
