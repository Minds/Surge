<?php
/**
 * Test for services functionalities
 */
 
class AppleTest extends PHPUnit_Framework_TestCase{

    /**
     * Test setting into sandbox mode
     */
    public function testCanSetSandbox(){
        $apple = Surge\Services\Factory::build('Apple', array('sandbox'=>true));
        $this->assertAttributeEquals('ssl://gateway.sandbox.push.apple.com:2195', 'host', $apple);
    }

}