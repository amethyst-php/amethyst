<?php

namespace Railken\LaraOre\Tests\Admin;

use Railken\Bag;
use Railken\LaraOre\Config\ConfigManager;

/**
 */
class UserTest extends BaseTest
{
    use Traits\ApiTestCommonTrait;
    

    public function testSignIn()
    {
        $response = $this->signIn();

        if ($response->getStatusCode() === 500) {
            print_r($response->getContent());
        }

        $response->assertStatus(200);
    }
}
