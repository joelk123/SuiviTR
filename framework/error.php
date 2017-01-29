<?php
namespace F3il;
defined('__F3IL__') or die('Accès intrerdit');


class Error extends \Exception
{    
    public function __construct($message)
    {
        parent::__construct($message, 0, null);
    }
    public function render()
    {
        require_once ROOT_PATH.'/framework/error/error_debug.php';
        return '';
    }
    public function __toString() {
        
         $conf= \F3il\Application::getConfig();
         if($conf==null)
         {
              echo file_get_contents(ROOT_PATH.'/framework/error/error_prod.php');
         }
         else
         {
             if($conf->debugMode!='production')
             {
                 return $this->render();
             }
             else
             {
                echo file_get_contents(ROOT_PATH.'/framework/error/error_prod.php');
             }
         }
         die();
    }
}

