<?php

namespace Suivitr;

defined('__SuiviTR__') or die('Acces interdit');

class EnseignantModel {

    public function ListEnseignant() {
        $db = \F3il\Application::getDB();


        $sql1 = "SELECT utilisateurs.id, abv, nom , prenom "
                . " FROM utilisateurs "
               . " WHERE admin = '0'"
                . " GROUP BY id";

        $req1 = $db->prepare($sql1);

        try {
            $req1->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

        $AllEnseignant = $req1->fetchAll(\PDO::FETCH_ASSOC);


        $sql = "SELECT utilisateurs.id,abv,nom,prenom  "
                . " FROM utilisateurs INNER JOIN tr"
                . " ON (utilisateurs.id = tr.id) ";

        $req = $db->prepare($sql);

        try {
            $req->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

//        $AllEnseignant = $req->fetchAll(\PDO::FETCH_ASSOC);


        $sql2 = "SELECT utilisateurs.id, count(code_tr)  "
                . " FROM utilisateurs INNER JOIN tr"
                . " ON (utilisateurs.id = tr.id) "
                . " WHERE admin = '0' AND"
                . " id_Eleve1 IS  NULL AND NOTE IS  NULL"
                . " GROUP BY id";

        $req2 = $db->prepare($sql2);

        try {
            $req2->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

        $SujetNA = $req2->fetchAll(\PDO::FETCH_ASSOC);

        $sql3 = "SELECT utilisateurs.id, count(code_tr)  "
                . " FROM utilisateurs INNER JOIN tr"
                . " ON (utilisateurs.id = tr.id) "
                . " WHERE admin = '0' AND"
                . " id_Eleve1 IS NOT NULL AND NOTE IS NULL "
                . " GROUP BY id";

        $req3 = $db->prepare($sql3);

        try {
            $req3->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

        $SujetC = $req3->fetchAll(\PDO::FETCH_ASSOC);


        $sql4 = "SELECT utilisateurs.id, count(code_tr)  "
                . " FROM utilisateurs INNER JOIN tr"
                . " ON (utilisateurs.id = tr.id) "
                . " WHERE admin = '0' AND"
                . " id_Eleve1 IS NOT NULL AND CLOTURER=0  "
                . " GROUP BY id";

        $req4 = $db->prepare($sql4);

        try {
            $req4->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

        $SujetT = $req4->fetchAll(\PDO::FETCH_ASSOC);

        $tmpSujetNA = 0;
        $tmpSujetC = 0;
        $tmpSujetT = 0;
        $i = 0;
        
        foreach ($AllEnseignant as $row) {
            $i = $i + 1;
                    $tmpSujetNA = 0;
                    if (!is_null($SujetNA)) {
                        foreach ($SujetNA as $rowNA) {
                            if ($rowNA['id'] == $row['id']) {
                                $tmpSujetNA = $rowNA['count(code_tr)'];
                            }
                        }
                    }
                    $tmpSujetC = 0;
                    if (!is_null($SujetC)) {
                        foreach ($SujetC as $rowC) {
                            if ($rowC['id'] == $row['id']) {
                                $tmpSujetC = $rowC['count(code_tr)'];
                            }
                        }
                    }
                    $tmpSujetT = 0;
                    if (!is_null($SujetT)) {
                        foreach ($SujetT as $rowT) {
                            if ($rowT['id'] == $row['id']) {
                                $tmpSujetT = $rowT['count(code_tr)'];
                            }
                        }
                    }
                     $donnee[] = array(
                    'id' => $row['id'],
                    'abv' => $row['abv'],
                    'enseignant' => utf8_encode($row['nom'] . " " . $row['prenom']),
                    'SujetEC' => $tmpSujetC,
                    'SujetNA' => $tmpSujetNA,
                    'SujetT' => $tmpSujetT,
                );
        }
        return json_encode($donnee);
    }

    public function creer(array $data) {
        $db = \F3il\Application::getDB();

        $sql = "INSERT INTO utilisateurs SET "
                . " nom = :nom"
                . ", prenom = :prenom"
                . ", login = :login"
                . ", abv = :abv"
                . ", admin = :admin"
                . ", password = :mdp"
                . ", creation = :date"
        ;
        $req = $db->prepare($sql);

        $date = date('Y-m-d H:i:s');


        $req->bindValue(':nom', $data['nom']);
        $req->bindValue(':prenom', $data['prenom']);
        $req->bindValue(':login', $data['login']);
        $req->bindValue(':abv', $data['abv']);
        $req->bindValue(':admin', '0');
        $req->bindValue(':mdp', \F3il\Authentication::hash($data['motdepasse'], $date));
        $req->bindValue(':date', $date);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
    }
    
     public function getEnseignant($id) {
         $db = \F3il\Application::getDB();
          $db->exec('SET NAMES utf8');
         
         $sql = "SELECT nom,prenom  "
                . " FROM utilisateurs"
                . " WHERE utilisateurs.id = :id ";

        $req = $db->prepare($sql);
        
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }
        
        $data = $req->fetch(\PDO::FETCH_ASSOC);
        
        return $data['nom']." ".$data['prenom'];
     }

}
