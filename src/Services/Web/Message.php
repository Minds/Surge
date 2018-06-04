<?php
/**
 * WebPush Message
 */

namespace Surge\Services\Web;

use Surge\Components\Interfaces;

class Message implements Interfaces\MessageInterface
{

    public $bigPicture;
    public $badge;
    public $group;
    public $largeIcon;
    public $title;
    public $message;
    public $token;
    public $service = "Web";
    public $uri;
    public $json = "";

    public function setBadge($badge)
    {
        $this->badge = $badge;
        return $this;
    }

    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    public function setBigPicture($bigPicture)
    {
        $this->bigPicture = $bigPicture;
        return $this;
    }

    public function setLargeIcon($icon)
    {
        $this->largeIcon = $icon;
        return $this;
    }

    public function getToken()
    {
        return json_decode(base64_decode($this->token), true);
    }

    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function setURI($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    public function setSound($sound)
    {
        return $this;
    }

    public function setJsonObject($json)
    {
        $this->json = $json;
        return $this;
    }

    public function toJSON()
    {
        $payload = [
            'notification' => [
                'body' => $this->message,
                'title' => $this->title ?: ' ',
                'uri' => $this->uri,
                'json' => $this->json,
                'largeIcon' => $this->largeIcon,
                'icon' => $this->bigPicture,
                'badge' => intval($this->badge)
            ]
        ];
        return json_encode($payload);
    }

}
