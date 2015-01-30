<?php
/**
 * Configurations
 */
 
namespace Surge;

class Config{
    
    public $config = array();
    
    public function __construct(array $config = array()){
        $this->config = $config;
    }
    
}   