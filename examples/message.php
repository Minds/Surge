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