<?php
/**
 * Service factory
 */
namespace Surge\Services;

use Surge\Components;
use Surge\Components\Interfaces\ServiceInterface;
use Surge\Components\Exceptions;

class Factory implements Components\Interfaces\FactoryInterface{
    
    
    public static function build($service, $options = array()){
        $classname = "\\Surge\\Services\\$service\\$service";
        if(class_exists($classname)){
            $class = new $classname($options);
            if($class instanceof ServiceInterface)
                return $class;
            else
                throw new Exceptions\ServiceNotInstance();
        } else {
            throw new Exceptions\ServiceNotFound();
        }
    }
    
}
    