<?php
/**
 * Service not implementing interface exception
 */
namespace Surge\Components\Exceptions;

class ServiceNotInstance extends \Exception{
    
    protected $message = "The service controller does implement the ServiceInterface interface";
    
}   