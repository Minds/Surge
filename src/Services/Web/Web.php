<?php


namespace Surge\Services\Web;

use Surge\Components\Interfaces;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;


class Web implements Interfaces\ServiceInterface
{

    private $options;

    public function __construct($options = array())
    {
        if (isset($options)) {
            $this->options = $options;
        }

    }

    public function request($message)
    {
        $webPush = new WebPush($this->options);

        $token = $message->getToken()['token'];
        $token['publicKey'] = $token['keys']['p256dh'];
        $token['authToken'] = $token['keys']['auth'];

        $result = $webPush->sendNotification(
            new Subscription($token['endpoint'], $token['keys']['p256dh'], $token['keys']['auth']),
            $message->toJSON(),true, [], $this->options);

        //todo check for expiration when $result == false

        return $result;
    }

    /**
     * Compile the message and send to the APNS service
     * @param Interfaces\MessageInterface $message
     * @return void
     */
    public function sendMessage($message)
    {
        $this->request($message);
    }


}