<?php

namespace Railken\LaraOre\Tests\Admin;

use Railken\Bag;
use Railken\LaraOre\User\UserManager;

class HttpLogTest extends BaseTest
{
    use Traits\ApiTestCommonTrait;
    
    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return '/api/v1/admin/http-logs';
    }
    

    /**
     * Test common requests.
     *
     * @return void
     */
    public function testSuccessCommon()
    {

        $url = $this->getBaseUrl();

        $response = $this->get($url, []);
        $this->assertOrPrint($response, 200);

    }
}
