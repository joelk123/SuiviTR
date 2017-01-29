<?php

namespace Suivitr;

defined('__SuiviTR__') or die('Acces interdit');

class SearchbarModel {

    public function SBEnseignant() {
         $db = \F3il\Application::getDB();

        $sql = "SELECT code_tr,titre "
                ." FROM tr WHERE ID = :id";
        
        $req = $db->prepare($sql);
        
        $req->bindValue(':id', $_SESSION['f3il.authentication']);
        
        try {
            $req->execute();                
        } catch (\PDOException $ex) {
            die($ex->getMessage());
            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
        }

         $donnee[] = array(
        'Nom' => "",
        'ID' => ""
      );
         
        $array = $req->fetchAll( \PDO::FETCH_ASSOC );
        foreach($array as $row){
            $donnee[] = array(
        'Nom' => utf8_encode($row['titre']),
        'ID' => $row["code_tr"]
      );
        }
        $sql2 ="SELECT num, eleves.nom ,eleves.prenom,code_tr "
                ." FROM (tr INNER JOIN utilisateurs"
                ." ON (tr.id = utilisateurs.id))"
                ." INNER JOIN eleves"
                ." ON tr.ID_Eleve1 = eleves.num"
                ." OR tr.ID_Eleve2 = eleves.num"
                ." OR tr.ID_Eleve3 = eleves.num"
                ." WHERE tr.id = :id";
        
        
        $req2 = $db->prepare($sql2);
        
        $req2->bindValue(':id', $_SESSION['f3il.authentication']);
         
        try {
            $req2->execute();                
        } catch (\PDOException $ex) {
            die($ex->getMessage());
            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
        }
        
         $array2 = $req2->fetchAll( \PDO::FETCH_ASSOC );
        foreach($array2 as $row){
            $donnee[] = array(
        'Nom' => utf8_encode($row['nom']." ".$row['prenom']),
        'ID' => $row["code_tr"]
        );}

        return json_encode($donnee);
    }
    public function SBAdmin() {
         $db = \F3il\Application::getDB();

         $sql = "SELECT code_tr,titre "
                ." FROM tr"
                ." WHERE CLOTURER = 1 OR"
                ." ID_Eleve1 IS NOT NULL";
        
        $req = $db->prepare($sql);
        
        try {
            $req->execute();                
        } catch (\PDOException $ex) {
            die($ex->getMessage());
            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
        }

         $donnee[] = array(
        'Nom' => "",
        'Type' => "",
        'ID' => ""
      );
         
        $array = $req->fetchAll( \PDO::FETCH_ASSOC );
        foreach($array as $row){
            $donnee[] = array(
        'Nom' => utf8_encode($row['titre']),
        'Type' => "TR",
        'ID' => $row["code_tr"]
      );
        }

         $sql2 = "SELECT nom,prenom,code_tr "
                ." FROM eleves "
                ." INNER JOIN tr"
                . " ON tr.ID_Eleve1 = eleves.num"
                . " OR tr.ID_Eleve2 = eleves.num"
                . " OR tr.ID_Eleve3 = eleves.num";
        
        $req2 = $db->prepare($sql2);
        
        try {
            $req2->execute();                
        } catch (\PDOException $ex) {
            die($ex->getMessage());
            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
        }
        
         $array2 = $req2->fetchAll( \PDO::FETCH_ASSOC );
        foreach($array2 as $row){
            $donnee[] = array(
        'Nom' => utf8_encode($row['nom']." ".$row['prenom']),
        'Type' => "TR",
        'ID' => $row["code_tr"]
        );}
        
        $sql3 = "SELECT id,nom,prenom "
                ." FROM utilisateurs "
                ." WHERE admin=0";
        
        $req3 = $db->prepare($sql3);
        
        try {
            $req3->execute();                
        } catch (\PDOException $ex) {
            die($ex->getMessage());
            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
        }
        
         $array3 = $req3->fetchAll( \PDO::FETCH_ASSOC );
        foreach($array3 as $row){
            $donnee[] = array(
        'Nom' => utf8_encode($row['nom']." ".$row['prenom']),
        'Type' => "Enseignant",
        'ID' => $row['id']
        );}

        return json_encode($donnee);
    }

}
