<?php

namespace Railken\LaraOre\Tests\Admin\Traits;

trait ApiTestCommonTrait
{
    public function commonTest($url, $parameters, $check = null)
    {
        if (!$check) {
            $check = $parameters;
        }
        
        # GET /
        $response = $this->get($url, []);
        $this->assertOrPrint($response, 200);

        # POST /
        $response = $this->post($url, $parameters->toArray());
        $this->assertOrPrint($response, 200);

        $resource = json_decode($response->getContent())->resource;

        foreach ($check as $key => $parameter) {
            $p = $resource->$key;

            if (is_object($p)) {
                $p = (array)$p;
            }

            $this->assertEquals($parameter, $p);
        }
        
        # GET /id
        $response = $this->get($url . "/". $resource->id);
        $this->assertOrPrint($response, 200);

        # PUT /id
        $response = $this->put($url . "/". $resource->id, $parameters->toArray());
        $resource = json_decode($response->getContent())->resource;
        $this->assertOrPrint($response, 200);

        # DELETE /id
        $response = $this->delete($url . "/". $resource->id);
        $this->assertOrPrint($response, 200);
        $response = $this->get($url . "/". $resource->id);
        $this->assertOrPrint($response, 404);
    }

    public function assertOrPrint($response, $code)
    {
        if ($response->getStatusCode() !== $code) {
            print_r($response);
        }

        $response->assertStatus($code);
    }
}
