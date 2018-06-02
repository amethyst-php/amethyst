<?php

namespace Railken\LaraOre\Tests\Admin;

use Railken\Bag;
use Railken\LaraOre\User\UserManager;

class WorkTest extends BaseTest
{
    use Traits\ApiTestCommonTrait;
    
    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return '/api/v1/admin/works';
    }
    
    /**
     * Retrieve correct bag of parameters.
     *
     * @return Bag
     */
    public function getParameters()
    {
        $bag = new bag();
        $bag->set('name', "El. psy. congroo. " . microtime(true));
        $bag->set('worker', 'Railken\LaraOre\Workers\EmailWorker');
        $bag->set('extra', [
            'to' => "{{ user.email }}",
            'subject' => "Welcome to the laboratory lab {{ user.name }}",
            'body' => "{{ message }}"
        ]);
        return $bag;
    }

    public function testSuccessCommon()
    {
        $this->commonTest($this->getBaseUrl(), $this->getParameters(), $this->getParameters()->remove('password'));
    }
}
