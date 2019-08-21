<?php
/**
 * Google  service manager
 */
namespace Surge\Services\Google;

use Surge\Components\Interfaces;

class Google implements Interfaces\ServiceInterface{

    private $api_key;
    private $host = 'https://fcm.googleapis.com/fcm/send';

    public function __construct($options = array()){
        if(isset($options['api_key']))
            $this->api_key = $options['api_key'];

    }

    public function request($message){
        $headers = array(
            'Authorization: key=' . $this->api_key,
            'Content-Type: application/json'
            );

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $this->host );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, $message);
        $result = curl_exec($ch );
        curl_close( $ch );

        return $result;
    }

    /**
     * Compile the message and send to the APNS service
     * @param Interfaces\MessageInterface $message
     * @return void
     */
    public function sendMessage($message){
        //@todo check interface
        $json = $message->toJSON();
        $this->request($json);
    }

}