<?php

    $hostname="localhost";
    $database="suivitr";
    $login = "root";
    $password ="";
    try{
        $db=new \PDO("mysql:host=$hostname;dbname=$database",$login, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $ex)
    {
        throw new Error("Erreur de connexion à la base de données : ".$ex->getMessage());
    }

        $sql = "SELECT code_tr,titre "
                ." FROM tr";
        
        $req = $db->prepare($sql);
        
        try {
            $req->execute();                
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL ".$ex->getMessage());
        }

         $donnee[] = array(
        'Nom' => "",
        'Type' => "",
        'ID' => ""
      );
         
        $array = $req->fetchAll( PDO::FETCH_ASSOC );
        foreach($array as $row){
            $donnee[] = array(
        'Nom' => utf8_encode($row['titre']),
        'Type' => 'TR',
        'ID' => $row["code_tr"]
      );
        }

         $sql2 = "SELECT nom,prenom,num "
                ." FROM eleves";
        
        $req2 = $db->prepare($sql2);
        
        try {
            $req2->execute();                
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL ".$ex->getMessage());
        }
        
         $array2 = $req2->fetchAll( PDO::FETCH_ASSOC );
        foreach($array2 as $row){
            $donnee[] = array(
        'Nom' => utf8_encode($row['nom']." ".$row['prenom']),
        'Type' => 'Eleve',
        'ID' => $row["num"]
        );}

        echo json_encode($donnee);
?>