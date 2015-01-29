<?php
/**
 * Factory interface
 */
namespace Surge\Components\Interfaces;

interface FactoryInterface{
    
    /**
     * Build
     * @param string $cmd
     * @param array (optional) $options
     * @return void
     */
    static public function build($cmd, $options = array());
    
}