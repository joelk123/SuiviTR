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

        $sql = "SELECT nom,prenom,num "
                ."FROM eleves WHERE NOT EXISTS (SELECT * FROM tr WHERE ID_Eleve1 = num OR ID_Eleve2 = num OR ID_Eleve3 = num) ";
        
        $req = $db->prepare($sql);
        
        try {
            $req->execute();                
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL ".$ex->getMessage());
        }

         $donnee[] = array(
        'Nom' => "",
        'ID' => ""
      );
        $array = $req->fetchAll( PDO::FETCH_ASSOC );
        foreach($array as $row){
        $donnee[] = array(
        'Nom' => utf8_encode($row['nom']." ".$row['prenom']),
        'ID' => $row["num"]
      );
        }

        echo json_encode($donnee);
?>