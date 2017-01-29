<?php

namespace F3il;
defined('__F3IL__') or die('Acces interdit');
 
/*
 * @return Field
 */
class Field {
  
    public $name;
    public $label;
    public $required;
    public $value="";
    public $defaultValue;
    public $phpFilter='';
    public $phpValidator='';
     /*
      * @param int $phpFilter : 
      * @param int $phpValidator;
      * 
      */
    public function __construct($name, $label, $defaultValue=null, $required=false, $phpFilter="", $phpValidator="")
    {
        $this->name=$name;  
        $this->label=$label;
        $this->defaultValue=$defaultValue;
        $this->required=$required;
        $this->phpFilter=$phpFilter;
        $this->phpValidator=$phpValidator;
        
    }
}
