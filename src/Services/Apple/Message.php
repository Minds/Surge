<?php
/**
 * APNS Message
 */
namespace Surge\Services\Apple;

use Surge\Components\Interfaces;

class Message implements Interfaces\MessageInterface{

    public $badge;
    public $bigPicture;
    public $group;
    public $largeIcon;
    public $title;
    public $message;
    public $token;
    public $service = "Apple";
    public $uri = "chat";
    public $sound = "default";
    public $json = "";

    public function setBadge($badge) {
        $this->badge = $badge;
        return $this;
    }

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
                'badge' => $this->badge,
                'url-args' => array(
                        $this->uri
                ),
                'sound' => $this->sound,
                'json' => $this->json
            ),
            'uri' => $this->uri
        );
        return json_encode($payload);
    }

}
