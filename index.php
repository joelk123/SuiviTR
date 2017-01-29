<?php
    namespace Suivitr;
    define('APPLICATION_NAMESPACE', 'Suivitr');
    define('__SuiviTR__','');
    define('ROOT_PATH', __DIR__);
    define('APPLICATION_PATH', ROOT_PATH.'/application');
    require_once'framework/f3il.php';
    
    //require_once 'application\controllers\Admin.Controller.php';
    
    $app= \F3il\Application::getInstance('configuration.ini');
    $app->setDefaultController('Login');
    $app->setAuthenticationDelegate('LoginModel');

    $app->run();    
 
    
