<?php

namespace Suivitr;
defined('__SuiviTR__') or die('Acces interdit');


class EleveModel {
    
    public function EleveA(){
          
        $db = \F3il\Application::getDB();
        $sql = "SELECT nom, prenom, cycle, annee, groupe,code_tr"
                . " FROM ELEVES INNER JOIN TR"
                . " ON tr.ID_Eleve1 = eleves.num"
                . " OR tr.ID_Eleve2 = eleves.num"
                . " OR tr.ID_Eleve3 = eleves.num";
        
        $reqTEA = $db->prepare($sql);

        try {
            $reqTEA->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $EleveA = $reqTEA->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach ($EleveA as $row){
             $donnee[] = array(
                    'cycle' => $row['cycle'],
                    'eleve' => utf8_encode( $row['nom']." ".$row['prenom']),
                    'annee' => $row['annee'],
                    'groupe' =>  $row['groupe'],
                    'code_tr' => $row['code_tr']
            );
            
        }
        return json_encode($donnee);
      }
      
      public function EleveNA(){  
          $db = \F3il\Application::getDB();
          $db->exec('SET NAMES utf8');
          
        $sql = " SELECT num, nom, prenom, cycle, annee, groupe"
                . " FROM eleves"
                . " WHERE NOT EXISTS(SELECT CODE_TR FROM tr WHERE ID_Eleve1 = num)"
                . " AND NOT EXISTS(SELECT CODE_TR FROM tr WHERE ID_Eleve2 = num)"
                . " AND NOT EXISTS(SELECT CODE_TR FROM tr WHERE ID_Eleve3 = num)";
        
        $reqTENA = $db->prepare($sql);

        try {
            $reqTENA->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $EleveNA = $reqTENA->fetchAll(\PDO::FETCH_ASSOC);
         foreach ($EleveNA as $row){
             
        $donnee[] = array(
                    'cycle' => $row['cycle'],
                    'eleve' =>  $row['nom']." ".$row['prenom'],
                    'annee' => $row['annee'],
                    'groupe' => $row['groupe'],
            
            );
         }  
         
        return json_encode($donnee);
}
}
