<?php
/**
 * Build a token
 */
 
namespace Surge;

class Token{
    
    /**
     * Create
     */
    public static function create($data = array()){
        $json = json_encode($data);
        return base64_encode($json);
    }
    
    
    /**
     * Read
     */
    public static function read($token){
        $json = base64_decode($token);
        return json_decode($json, true);
    }
}   