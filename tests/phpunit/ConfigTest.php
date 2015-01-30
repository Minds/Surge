<?php
/**
 * Test building configurations
 */
 
class ConfigTest extends PHPUnit_Framework_TestCase{

    /**
     * Test creating a token
     */
    public function testCanCreate(){
        $data = array(
                    'Apple' => array(
                        'cert'=> dirname(dirname(__FILE__)) . '/private/apns.pem',
                        'sandbox'=>true
                        ),
                    'Google' => array(
                        'api_key' => 'AIzaSyCp0LVJLY7SzTlxPqVn2-2zWZXQKb1MscQ'
                        ));
        $config = new Surge\Config($data);
        $this->assertEquals($data, $config->config);
    }

}