<?php
/**
 * Message factory
 */
namespace Surge\Messages;

use Surge\Components;
use Surge\Components\Interfaces\MessageInterface;
use Surge\Components\Exceptions;
use Surge\Token;

class Factory implements Components\Interfaces\FactoryInterface{
    
    
    public static function build($token, $options = array()){
        
        //read the token
        $data = Token::read($token);
        $service = ucfirst($data['service']);

        $classname = "\\Surge\\Services\\$service\\Message";
        if(class_exists($classname)){
            $class = new $classname($options);
            $class->token = $data['token'];
            if($class instanceof MessageInterface)
                return $class;
            else
                throw new Exceptions\ServiceNotInstance();
        } else {
            throw new Exceptions\ServiceNotFound();
        }
    }
    
}
    