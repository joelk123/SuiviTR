<?php

namespace Suivitr;
defined('__PENSEE__') or die('Acces interdit');

class PenseeController extends \F3il\Controller {
   
    
    public function __construct() {
        $this->setDefaultActionName('index');
    }
    
    function indexAction(){
        $page= \F3il\Application::getPage();
        $page->setTemplate('pensee');
        $page->setView('index');
        $model = new Penseemodel();
        $page->pensees = $model->derniere();
        $page->aleatroi = $model->aleatroi();
        
    }
    
    function creeraction(){
        die(__METHOD__);
    }
    
    
}

