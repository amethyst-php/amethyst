<?php

namespace Railken\LaraOre\Tests\Admin;

use Railken\Bag;
use Railken\LaraOre\Report\Pdf\PdfManager;

/**
 */
class TemplatePdfTest extends BaseTest
{
    use Traits\ApiTestCommonTrait;
    
    /**
     * Retrieve basic url.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return '/api/v1/admin/report-pdf';
    }

    /**
     * Retrieve basic url.
     *
     * @return \Railken\Laravel\Manager\Contracts\ManagerContract
     */
    public function getManager()
    {
        return new PdfManager();
    }

    /**
     * Retrieve correct bag of parameters.
     *
     * @return Bag
     */
    public function getParameters()
    {
        $bag = new bag();
        $bag->set('name', "A simple file");
        $bag->set('filename', "file.pdf");
        $bag->set('mock_data', ['message' => 'lie']);
        $bag->set('template', "The cake is a {{ message }}");

        return $bag;
    }

    public function testSuccessCommon()
    {
        $this->commonTest(['name', 'filename', 'mock_data', 'template']);
    }

    public function testWrongCreate()
    {
        $response = $this->post($this->getBaseUrl(), []);
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'USER_NAME_NOT_DEFINED'],
                ['code' => 'USER_FILENAME_NOT_DEFINED'],
                ['code' => 'USER_TEMPLATE_NOT_DEFINED'],
                ['code' => 'USER_MOCK_DATA_NOT_DEFINED'],
            ],
        ]);
    }

    public function testWrongName()
    {
        $response = $this->post($this->getBaseUrl(), $this->getParameters()->set('name', '?????')->toArray());
        $response->assertStatus(400);
        $response->assertJson([
            'errors' => [
                ['code' => 'USER_NAME_NOT_VALID'],
            ],
        ]);
    }

}
