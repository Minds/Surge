<?php
/**
 * Test for token creation
 */
 
class TokenTest extends PHPUnit_Framework_TestCase{

    /**
     * Test creating a token
     */
    public function testCanCreate(){
        $token = Surge\Token::create(array(
            'service' => 'apple',
            'token'=> 'abc123'
            ));
        $this->assertInternalType('string', $token);
    }
    
    /**
     * Test can create and read
     */
    public function testCanRead(){
         $token = Surge\Token::create(array(
            'service' => 'apple',
            'token'=> 'abc123'
            ));
         $data = Surge\Token::read($token);
         $this->assertEquals('apple', $data['service']);
         $this->assertEquals('abc123', $data['token']);
    }

}