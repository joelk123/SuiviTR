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

        $sql = "SELECT code_tr, titre,utilisateurs.abv "
                ." FROM tr INNER JOIN utilisateurs"
                ." ON (tr.id = utilisateurs.id)";
        
        $req = $db->prepare($sql);
        
        try {
            $req->execute();                
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL ".$ex->getMessage());
        }

        $array = $req->fetchAll( PDO::FETCH_ASSOC );
        foreach($array as $row){
            $donnee[] = array(
        'code_tr' => $row["code_tr"],
        'titre' => utf8_encode($row['titre']),
        'abv' => $row["abv"]
        );}
        echo json_encode($donnee);
        
