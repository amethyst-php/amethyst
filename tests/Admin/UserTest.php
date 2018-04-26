<?php

namespace Railken\LaraOre\Tests\Admin;

use Railken\Bag;
use Railken\LaraOre\Core\User\UserManager;

/**
 * Testing disk
 * Attributes to fill are: name, driver, enabled, config.
 */
class UserTest extends BaseTest
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
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new UserManager();
    }

    /**
     * Retrieve correct bag of parameters.
     *
     * @return Bag
     */
    public function getParameters($role = 'admin')
    {
        $rnd = time(true).str_random(5);

        $bag = new bag();
        $bag->set('name', "GLaDOS");
        $bag->set('email', $rnd . "@test.net");
        $bag->set('password', $rnd);
        $bag->set('role', $role);
        $bag->set('enabled', 1);

        return $bag;
    }

    public function testSuccessCommon()
    {
        $this->commonTest(['name', 'email']);
    }

    public function testWrongCreate()
    {
        $response = $this->post($this->getBaseUrl(), []);
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'USER_NAME_NOT_DEFINED'],
                ['code' => 'USER_EMAIL_NOT_DEFINED'],
                ['code' => 'USER_PASSWORD_NOT_DEFINED'],
            ],
        ]);
    }

    /*public function testWrongName()
    {
        $response = $this->post($this->getBaseUrl(), $this->getParameters()->set('name', '?????')->toArray());
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'USER_NAME_NOT_VALID'],
            ],
        ]);
    }*/
    public function testSignInEnabled()
    {

        // Trying to login with enabled = 0
        $parameters = $this->getParameters('user');
        $response = $this->post(
            $this->getBaseUrl(), 
            $parameters->set('enabled', 0)->toArray()
        );
        $response->assertStatus(200);

        $response = $this->post('/api/v1/sign-in', [
            'username' => $parameters->get('email'),
            'password' => $parameters->get('password')
        ]);
        $response->assertStatus(400);

        // Trying to login with enabled = 1
        $parameters = $this->getParameters('user');

        $response = $this->post(
            $this->getBaseUrl(), 
            $parameters->set('enabled', 1)->toArray()
        );
        $response->assertStatus(200);

        $response = $this->post('/api/v1/sign-in', [
            'username' => $parameters->get('email'),
            'password' => $parameters->get('password')
        ]);
        $response->assertStatus(200);

    }

    public function testWrongEnabled()
    {
        $response = $this->post($this->getBaseUrl(), $this->getParameters()->set('enabled', '2')->toArray());
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'USER_ENABLED_NOT_VALID'],
            ],
        ]);

        $response = $this->post($this->getBaseUrl(), $this->getParameters()->set('enabled', 'A')->toArray());
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'USER_ENABLED_NOT_VALID'],
            ],
        ]);


    }

    public function testWrongEmail()
    {
        $response = $this->post($this->getBaseUrl(), $this->getParameters()->set('email', 'abc')->toArray());
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'USER_EMAIL_NOT_VALID'],
            ],
        ]);


        $response = $this->post($this->getBaseUrl(), $this->getParameters()->set('email', 'admin@admin.com')->toArray());
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'USER_EMAIL_NOT_UNIQUE'],
            ],
        ]);
    }

}
