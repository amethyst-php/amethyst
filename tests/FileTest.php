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
        $bag->set('disk_id', '?');
        $bag->set('type', 'path');
        $bag->set('path', 1);
        $bag->set('status', [
            'url'        => 'http://localhost:8000',
            'visibility' => 'public',
            'root'       => '...',
        ]);

        return $bag;
    }

    public function testSuccessCommon()
    {
        // Create a disk
    }

}
