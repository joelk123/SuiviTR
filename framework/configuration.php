<?php

namespace F3il;
defined('__F3IL__') or die('Acces interdit');
class Configuration
{
    static private $_instance;
    private $data;
    
    private function __construct($fichierIni)
    {
        if(!is_readable(APPLICATION_PATH.'/'.$fichierIni)){
            throw new Error('Le fichier de configuration est introuvable');
        }
        else
        {
            $this->data=parse_ini_file(APPLICATION_PATH.'/'.$fichierIni);
            if($this->data==false)
            {
                throw new Error('Aucunes configurations trouvées');
            }
        }
                
    }
    public static function getInstances($fichierIni)
    {
        
        if(is_null(self::$_instance))
        {
            self::$_instance=new Configuration($fichierIni);
            return self::$_instance;
        }
        else
        {
            return self::$_instance;
        }
    }
    public function __get($name)
    {
        if(isset($this->data[$name]))
        {
            return $this->data[$name];
        }
        else
        {
            throw new Error('Propriété non trouvée');
        }
    }
}

?>