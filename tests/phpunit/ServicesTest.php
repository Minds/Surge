<?php
/**
 * Test for services functionalities
 */
 
class ServicesTest extends PHPUnit_Framework_TestCase{

    /**
     * Test building a service
     */
    public function testCanBuildService(){
        $apple = Surge\Services\Factory::build('Apple');
        $this->assertInstanceOf('Surge\Components\Interfaces\ServiceInterface', $apple);
    }
    


}