<?php

namespace Railken\LaraOre\Tests\Admin\Traits;

trait ApiTestCommonTrait
{
    public function commonTest($params)
    {   
        $parameters = $this->getParameters();
        
        # GET /
        $response = $this->get($this->getBaseUrl(), []);
        $response->assertStatus(200);

        # POST /
        $response = $this->post($this->getBaseUrl(), $parameters->toArray());
        $response->assertStatus(200);

        $resource = json_decode($response->getContent())->resource;

        foreach ($params as $param) {
            $p = $resource->$param;

            if (is_object($p)) {
                $p = (array)$p;
            }

            $this->assertEquals($parameters->get($param), $p);
        }
        
        # GET /id
        $response = $this->get($this->getBaseUrl() . "/". $resource->id);
        $response->assertStatus(200);

        # PUT /id
        $response = $this->put($this->getBaseUrl() . "/". $resource->id, $parameters->toArray());
        $resource = json_decode($response->getContent())->resource;
        $response->assertStatus(200);

        # DELETE /id
        $response = $this->delete($this->getBaseUrl() . "/". $resource->id);
        $response->assertStatus(200);
        $response = $this->get($this->getBaseUrl() . "/". $resource->id);
        $response->assertStatus(404);
    }
}
