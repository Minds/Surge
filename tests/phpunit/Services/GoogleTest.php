<?php
/**
 * Test for services functionalities
 */
 
class GoogleTest extends PHPUnit_Framework_TestCase{

    /**
     * Test setting into sandbox mode
     */
    public function testCanSetApiKey(){
        $google = Surge\Services\Factory::build('Google', array('api_key'=>'key...here'));
        $this->assertAttributeEquals('key...here', 'api_key', $google);
    }

}