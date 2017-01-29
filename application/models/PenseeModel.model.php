<?php

namespace Suivitr;
defined('__PENSEE__') or die('Acces interdit');

class PenseeModel  {
    
    public function derniere() {
        $db = \F3il\Application::getDB();
        $sql = "SELECT * FROM pensées ORDER BY date DESC LIMIT 5";
        $req = $db->prepare($sql);
        $res = $req ->fetchAll(\PDO::FETCH_ASSOC); 
        return $res;
        
    }
    public function aleatroi(){
        $db = \F3il\Application::getDB();
        $sql =  "SELECT * FROM pensees ORDER BY RAND() LIMIT 1" ;
        $req = $db->prepare($sql);
        $res = $req->fetch(\PDO::FETCH_ASSOC);
        return $res;
    }
    
}
