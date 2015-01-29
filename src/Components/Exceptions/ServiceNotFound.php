<?php
/**
 * Service not found exception
 */
namespace Surge\Components\Exceptions;

class ServiceNotFound extends \Exception{
    
    protected $message = "The service was not found";
    
}   