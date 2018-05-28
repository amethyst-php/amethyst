<?php

class AppTest extends \Railken\LaraOre\Tests\Admin\BaseTest
{
    /**
     * Retrieve app
     */
    public function getApp()
    {
    	return $this->app;
    }
}

$t = new AppTest();
$t->setUp();

return $t->getApp();

