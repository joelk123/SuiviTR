<?php

namespace F3il;
defined('__F3IL__') or die('Accès interdit');

abstract class Controller{
    
    protected $defaultActionName;
    
    public function setDefaultActionName($actionName)
    {
        
        if(method_exists($this, $actionName.'Action'))
        {
            
            $this->defaultActionName=$actionName;
        }
        else
        {
            throw new Error('Méthode inéxistante');
        }
    }
    public function getDefaultActionName()
    {
        return $this->defaultActionName;
    }
    public function execute($actionName)
    {
        $action=$actionName.'Action';
        if(method_exists($this, $actionName.'Action'))
        {
            $this->$action();
        }
        else
        {
            throw new Error('Méthode inéxistante');
        }
    }
}
?>
