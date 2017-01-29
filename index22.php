<?php

    namespace Suivitr;
    define('APPLICATION_NAMESPACE', 'Suivitr');
    define('PENSEES','');
    define('ROOT_PATH', __DIR__);
    define('APPLICATION_PATH', ROOT_PATH.'/application');
    require_once'framework/f3il.php';
    
    $app= \F3il\Application::getInstance(APPLICATION_PATH.'/configuration22.ini');
    $app->setDefautController('pensee');
    //$app= setAuthentificationDelegate('LoginModel');
    $app->run();
    