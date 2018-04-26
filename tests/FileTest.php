<?php

namespace Railken\LaraOre\Tests;

use Railken\Bag;
use Railken\LaraOre\Core\File\FileManager;

/**
 * Testing File
 * Attributes to fill are: disk_id,type,path,status,checksum,permission,access
 */
class FileTest extends BaseTest
{
    use Traits\ApiTestCommonTrait;

    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return '/api/v1/admin/files';
    }

    /**
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new FileManager();
    }

    /**
     * Retrieve correct bag of parameters.
     *
     * @return Bag
     */
    public function getParameters()
    {
        $bag = new bag();
        $bag->set('content', 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNk+M9QDwADhgGAWjR9awAAAABJRU5ErkJggg==');
        $bag->set('type', 'uhm');
        $bag->set('access', 'private');

        return $bag;
    }

    /**
     * Retrieve correct bag of parameters.
     *
     * @return Bag
     */
    public function getDiskParameters($driver = "s3")
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
                'bucket'        => env('TEST_DISK_DRIVER_S3_BUCKET'),
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

    public function upload($driver, $access)
    {
        $response = $this->post('/api/v1/admin/disks', $this->getDiskParameters($driver)->toArray());
        $response->assertStatus(200);
        $resource = json_decode($response->getContent())->resource;


        $response = $this->post(
            $this->getBaseUrl() . "/upload",
            $this->getParameters()
                ->set('disk_id', $resource->id)
                ->set('access', $access)
                ->toArray()
        );

        $response->assertStatus(200);

        $resource = json_decode($response->getContent())->resource;

        if ($driver !== 'local') {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $resource->readable);
            $this->assertEquals(200, $response->getStatusCode());
        }

    }

    public function testUpload()
    {
        $this->upload('s3', 'private');
        $this->upload('local', 'public');
    }
}
