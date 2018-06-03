<?php

namespace Railken\LaraOre\Tests\Admin;

use Railken\Bag;
use Railken\LaraOre\User\UserManager;

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
            'url'           => 'http://localhost:8000',
            'visibility'    => 'public',
            'root'          => 'var/cache',
        ]);
        return $bag;
    }

    /**
     * Test common requests.
     *
     * @return void
     */
    public function testSuccessCommon()
    {
        $this->commonTest($this->getBaseUrl(), $parameters = $this->getParameters(), $parameters);
    }
}
