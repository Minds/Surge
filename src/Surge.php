<?php
/**
 * Surge: A php module for sending push notifications
 * @author Mark Harding (mark@minds.com)
 * @copyright Minds.org, Inc. 2015
 * @license TBC
 */
 
namespace Surge;

use Surge\Config;
use Surge\Services;
use Surge\Components\Interfaces\MessageInterface;
use Surge\Components\Exceptions\InvalidParameter;

class Surge{
    
    /**
     * Send a message
     */
    public static function send($message, $config){
        if(!$message instanceof MessageInterface)
            throw new InvalidParameter('$message must be of type MessageInterface');
        
        if(!$config instanceof Config)
            throw new InvalidParameter('$config must be of type Config');
        
        Services\Factory::build($message->service, $config->config[$message->service])
            ->sendMessage($message);
    }
    
}   