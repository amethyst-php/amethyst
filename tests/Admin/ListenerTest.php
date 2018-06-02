<?php

namespace Railken\LaraOre\Tests\Admin;

use Railken\Bag;
use Railken\LaraOre\User\UserManager;

class ListenerTest extends BaseTest
{
    use Traits\ApiTestCommonTrait;
    
    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return '/api/v1/admin/listeners';
    }
        
    /**
     * New work
     *
     * @return \stdClass
     */
    public function newWork()
    {
        $bag = new bag();
        $bag->set('name', "El. psy. congroo. " . microtime(true));
        $bag->set('worker', 'Railken\LaraOre\Workers\EmailWorker');
        $bag->set('extra', [
            'to' => "{{ user.email }}",
            'subject' => "Welcome to the laboratory lab {{ user.name }}",
            'body' => "{{ message }}"
        ]);
        $response = $this->post("/api/v1/admin/works", $bag->toArray());
        $resource = json_decode($response->getContent())->resource;
        return $resource;
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
        $bag->set('work_id', $this->newWork()->id);
        $bag->set('event_class', 'Dummy');
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
