<?php
namespace F3il;
defined('__F3IL__') or die('Acces interdit');
/**
 * Description of form
 *
 * @author Me
 */
abstract class Form {
    
    CONST CREATE_MODE=1;
    CONST EDIT_MODE=2;
    
    protected $_destination;
    protected $_fields=array();
    public $_valid;
    protected $_messages=array();
    protected $_mode;

    public function __construct($destination, $mode= Form::CREATE_MODE)
    {
        $this->_destination= $destination;
        $this->_mode= $mode;
    }
    public function __get($name)
    {
        if(isset($this->_fields[$name]))
        {
            return $this->_fields[$name]->value;
        }
        else
        {
            throw new Error("Champ non défini");
        }
    }
    public function __isset($name)
    {
        return isset($this->_fields[$name]);
    }
    protected function addFormField(Field $field)
    {
        if(!isset($this->_fields[$field->name]))
        {
            $this->_fields[$field->name]=$field;
        }
        else
        {
            throw new Error('Champ déjà défini');
        }
    }
    public function addMessage($name, $message)
    {
        $this->_messages[$name]=$message;
    }
    public function _createValidate()
    {
        $valid=true;
      
        foreach($this->_fields as $field)
        {
            if($field->required && empty($field->value))
            {
                $valid=false;
                $this->addMessage($field->name, "Erreur sur le champ ".$field->label);
            }
            if(method_exists($this, $field->name.'Validate'))
            {
                $fieldValid=$field->name.'Validate';
                $this->$fieldValid($field->value);
            }
            else if(!empty($field->phpValidator))
            {
                $fieldValid=filter_var($field->value,$field->phpValidator);
            }
            else
            {
                $fieldValid=$this->defaultValidator('');
            }

            $valid=$valid&&$fieldValid;
        }
        $this->_valid=$valid;
        return $valid;
    }
    public function defaultValidator($name)
    {
        return true;
    }
    public function _editValidate()
    {
        return $this->_createValidate();
    }
    public function getData()
    {
        $datas=array();
        foreach($this->_fields as $field)
        {
            $datas[$field->name]=$field->value;
        }
        return $datas;
    }
    public function getMessages()
    {
        return $this->_messages;
    }
    public function loadData(array $source)
    {
        foreach($this->_fields as $field)
        {
            if(isset($source[$field->name])&&!empty($source[$field->name]))
            {
                $val=$source[$field->name];
            }
            else
            {
                $val=$field->defaultValue;
            }
            if(method_exists($this, $field->name."Filter"))
            {
                $filtre=$field->name."Filter";
                $field->value=$this->$filtre($val);
            }
            else if(!empty($field->phpFilter))
            {
                $field->value=filter_var($val,$field->phpFilter);
            }
            else
            {
                $field->value=$val;
            }
        }
    }
    abstract public function render();
    
    public function _validate()
    {
        if($this->_mode==1)
        {
            return $this->_createValidate();
        }
        else if($this->_mode==2)
        {
            return $this->_editValidate();
        }
        else
        {
            throw new Error("Mode de formulaire inconnu");
        }
    }
    
}
