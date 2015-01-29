<?php
/**
 * Common helper function for apns
 */
namespace Surge\Services\Apple\Helpers;

class Common{
 
    /**
     * Return the binary data that apple wants
     */
    public static function getBinary($token, $json){
        return chr(0).
                chr(0).
                chr(32).
                pack('H*', $token).
                chr(0).chr(strlen($json)).
                $json;
    }
            
}
    