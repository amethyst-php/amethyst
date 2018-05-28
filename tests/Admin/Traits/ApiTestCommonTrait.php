<?php

namespace Railken\LaraOre\Tests\Admin\Traits;

trait ApiTestCommonTrait
{
    public function commonTest($url, $parameters)
    {
        
        # GET /
        $response = $this->get($url, []);
        $response->debug();
        $response->assertStatus(200);

        # POST /
        $response = $this->post($url, $parameters->toArray());
        $response->debug();
        $response->assertStatus(200);

        $resource = json_decode($response->getContent())->resource;

        foreach ($parameters as $param) {
            $p = $resource->$param;

            if (is_object($p)) {
                $p = (array)$p;
            }

            $this->assertEquals($parameters->get($param), $p);
        }
        
        # GET /id
        $response = $this->get($url . "/". $resource->id);
        $response->debug();
        $response->assertStatus(200);

        # PUT /id
        $response = $this->put($url . "/". $resource->id, $parameters->toArray());
        $resource = json_decode($response->getContent())->resource;
        $response->debug();
        $response->assertStatus(200);

        # DELETE /id
        $response = $this->delete($url . "/". $resource->id);
        $response->debug();
        $response->assertStatus(200);
        $response = $this->get($url . "/". $resource->id);
        $response->debug();
        $response->assertStatus(404);
    }
}
