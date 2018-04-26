<?php

namespace Railken\LaraOre\Tests\Traits;

trait ApiTestCommonTrait
{
    public function commonTest($params)
    {
        
        # GET /
        $response = $this->get($this->getBaseUrl(), []);
        $response->assertStatus(200);

        # POST /
        $response = $this->post($this->getBaseUrl(), $this->getParameters()->toArray());
        $response->assertStatus(200);

        $resource = json_decode($response->getContent())->resource;

        foreach ($params as $param) {
            $p = $resource->$param;

            if (is_object($p)) {
                $p = (array)$p;
            }

            $this->assertEquals($this->getParameters()->get($param), $p);
        }
        
        # GET /id
        $response = $this->get($this->getBaseUrl() . "/". $resource->id);
        $response->assertStatus(200);

        # PUT /id
        $response = $this->put($this->getBaseUrl() . "/". $resource->id, $this->getParameters()->set('enabled', 0)->toArray());
        $resource = json_decode($response->getContent())->resource;
        $response->assertStatus(200);
        $this->assertEquals(0, $resource->enabled);

        # DELETE /id
        $response = $this->delete($this->getBaseUrl() . "/". $resource->id);
        $response->assertStatus(200);
        $response = $this->get($this->getBaseUrl() . "/". $resource->id);
        $response->assertStatus(404);
    }
}
