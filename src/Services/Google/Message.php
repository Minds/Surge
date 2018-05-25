<?php
/**
 * GPN Message
 */
namespace Surge\Services\Google;

use Surge\Components\Interfaces;

class Message implements Interfaces\MessageInterface{

    public $bigPicture;
    public $group;
    public $largeIcon;
    public $title;
    public $message;
    public $token;
    public $service = "Google";
    public $uri;
    public $json = "";

    public function setGroup($group) {
        $this->group = $group;
        return $this;
    }

    public function setBigPicture($bigPicture) {
        $this->bigPicture = $bigPicture;
        return $this;
    }

    public function setLargeIcon($icon) {
        $this->largeIcon = $icon;
        return $this;
    }

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
        return $this;
    }

    public function setJsonObject($json){
      $this->json = $json;
      return $this;
    }

    public function toJSON(){
        $payload = array(
            'data' => array(
                'body' =>  $this->message,
                'group' => $this->group,
                'title' => $this->title,
                'sound'=>1,
                'vibrate'=>1,
                'uri' => $this->uri,
                'notId' => 1,
                'json' => $this->json,
                'largeIcon' => $this->largeIcon,
                'bigPicture' => $this->bigPicture
            ),
            'registration_ids' => array($this->token)
        );
        return json_encode($payload);
    }

}
