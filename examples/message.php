<?php
/**
 * Creates a subscription
 */
 
require_once(dirname(dirname(__FILE__)) . '/vendor/autoload.php');

$message = new Surge\Services\Apple\Message();
$message->setToken('200724913eb12dcaa64fd709b88ef605a5066f4be674beadf8595fb04dbd8918')
        ->setMessage('Hello iPhone');

$apple = Surge\Services\Factory::build('Apple', array(
    'cert'=>dirname(dirname(__FILE__)) . '/private/apns.pem',
    'sandbox' => true
    ));
$apple->sendMessage($message);

//now try our android
$message = new Surge\Services\Google\Message();
$message->setToken('APA91bElSr3xoAEa2aYfhTUWylZbFOW6kyypsbj3GRUnnBb1cXmaH7sD_lkqvtq-DGYMjH7w9-0pKwjhey_zyLLRkBvYJw-O16QhPrKsPHur4knT12nd17CEW7bV76H_XmrB0yRMO00vjpkazKN4gAYHwnZQtNFnhg')
        ->setMessage('Hello Android');
        
$google = Surge\Services\Factory::build('Google', array(
    'api_key'=> 'AIzaSyCp0LVJLY7SzTlxPqVn2-2zWZXQKb1MscQ'
    ));
$google->sendMessage($message);