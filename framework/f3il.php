<?php
    namespace F3il;
    define('__F3IL__','');
    if(!defined('ROOT_PATH')){throw new Error('Accès interdit');}
    if(!defined('APPLICATION_PATH')){throw new Error('Accès interdit');}
    if(!defined('APPLICATION_NAMESPACE')){throw new Error('Accès interdit');}
    require_once('/framework/autoloader.php');
    \session_start();
    $autoLoader= \F3il\AutoLoader::getInstance(APPLICATION_PATH, APPLICATION_NAMESPACE);
?>