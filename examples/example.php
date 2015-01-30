<?php
/**
 * Creates a subscription
 */
 
require_once(dirname(dirname(__FILE__)) . '/vendor/autoload.php');

//create a token so we can send to this device and skip this step in future
$iphone = Surge\Token::create(array(
            'service' => 'apple',
            'token' => '200724913eb12dcaa64fd709b88ef605a5066f4be674beadf8595fb04dbd8918'
            ));

$android = Surge\Token::create(array(
            'service' => 'google',
            'token' => 'APA91bElSr3xoAEa2aYfhTUWylZbFOW6kyypsbj3GRUnnBb1cXmaH7sD_lkqvtq-DGYMjH7w9-0pKwjhey_zyLLRkBvYJw-O16QhPrKsPHur4knT12nd17CEW7bV76H_XmrB0yRMO00vjpkazKN4gAYHwnZQtNFnhg'
            ));

$config = new Surge\Config(array(
                'Apple' => array(
                    'cert'=> dirname(dirname(__FILE__)) . '/private/apns.pem',
                    'sandbox'=>true
                    ),
                 'Google' => array(
                    'api_key' => 'AIzaSyCp0LVJLY7SzTlxPqVn2-2zWZXQKb1MscQ'
                    )));

foreach(array($iphone, $android) as $phone){                    
    $message = Surge\Messages\Factory::build($phone)
        ->setTitle('Hello there')
        ->setMessage('this is a test');
        
    Surge\Surge::send($message, $config);
}