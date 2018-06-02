<?php

namespace Railken\LaraOre\Tests\Admin;

use Railken\Bag;

class UsersTest extends BaseTest
{
    use Traits\ApiTestCommonTrait;
    
    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return '/api/v1/admin/users';
    }

    /**
     * Retrieve correct bag of parameters.
     *
     * @return Bag
     */
    public function getParameters()
    {
        $bag = new Bag();
        $bag->set('name', "A name");
        $bag->set('email', "test".microtime(true)."@test.net");
        $bag->set('password', 'password');
        // $bag->set('role', 'user');
        $bag->set('enabled', 1);

        return $bag;
    }

    /**
     * Test common requests.
     *
     * @return void
     */
    public function testSuccessCommon()
    {
        $this->commonTest($this->getBaseUrl(), $parameters = $this->getParameters(), (new Bag($parameters))->remove('password'));
    }
}
