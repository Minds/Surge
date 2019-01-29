<?php
/**
 * Apple service manager
 */
namespace Surge\Services\Apple;

use Surge\Components\Interfaces;

class Apple implements Interfaces\ServiceInterface{
    
    private $certificate;
    private $host = 'ssl://gateway.push.apple.com:2195';
    
    public function __construct($options = array()){
        if(isset($options['cert']))
            $this->certificate = $options['cert'];
        if(isset($options['sandbox']) && $options['sandbox'])
            $this->host = 'ssl://gateway.sandbox.push.apple.com:2195';
    }
    
    public function request($message){
        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', $this->certificate);
        stream_context_set_option($ctx, 'ssl', 'passphrase', '');
        
        $stream = stream_socket_client($this->host, 
            $err, 
            $errstr, 
            60, 
            STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, 
            $ctx);
            
        if(!$stream){
            var_dump($err, $errstr);
            //exit;   
        }

        $result = fwrite($stream, $message, strlen($message));
        fclose($stream);
    }
    
    /**
     * Compile the message and send to the APNS service
     * @param Interfaces\MessageInterface $message
     * @return void
     */
    public function sendMessage($message){
        //@todo check interface
        $json = $message->toJSON();
        $token = $message->token;
        $this->request(Helpers\Common::getBinary($token, $json));
    }
    
}   
