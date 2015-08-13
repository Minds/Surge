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
    public $service = "Apple";
    public $uri = "chat";
    public $sound = "default";
    public $json = "";

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

    public function setURI($uri){
        $this->uri = $uri;
        return $this;
    }

    public function setSound($sound){
        $this->sound = $sound;
        return $this;
    }

    public function setJsonObject($json){
      $this->json = $json;
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
                        $this->uri
                 ),
                 'sound' => $this->sound,
                 'json' => $this->json
            )
        );
        return json_encode($payload);
    }

}
