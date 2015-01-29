<?php
/**
 * APNS Message
 */
namespace Surge\Services\Apple;

use Surge\Components\Interfaces;

class Message implements Interfaces\MessageInterface{
    
    public $title;
    public $message;
    public $token;
    
    public function setToken($token){
        $this->token = $token;
        return $this;
    }
     
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }
    
    public function setMessage($message){
        $this->message = $message;
        return $this;
    }
    
    public function toJSON(){
        $payload = array(
            'aps' => array(
                'alert' => array(
                    'title' => $this->title ,
                    'body' => $this->message,
                 ),
                 'url-args' => array(
                        'app://url'
                 ),
                 'sound' => 'default'
            )
        );
        return json_encode($payload);
    }
         
}