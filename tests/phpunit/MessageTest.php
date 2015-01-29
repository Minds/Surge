<?php
/**
 * Test for services functionalities
 */
 
class MessageTest extends PHPUnit_Framework_TestCase{

    /**
     * Test building a message
     */
    public function testCanBuildMessage(){
        $message = new Surge\Services\Apple\Message();
        $message->setToken('200724913eb12dcaa64fd709b88ef605a5066f4be674beadf8595fb04dbd8918')
                ->setMessage('Hello iPhone');
       
        $this->assertInstanceOf('Surge\Components\Interfaces\MessageInterface', $message);
        $this->assertEquals('Hello iPhone', $message->message);
        $this->assertEquals('200724913eb12dcaa64fd709b88ef605a5066f4be674beadf8595fb04dbd8918', $message->token);
    }

}