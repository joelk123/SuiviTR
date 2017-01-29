<?php

namespace Suivitr;

defined('__SuiviTR__') or die('Acces interdit');

class SujetModel {

    public function BadgeEnseignant() {
        $db = \F3il\Application::getDB();

        $sql = "SELECT COUNT(*)"
                . " FROM TR"
                . " WHERE ID = :id";
        $req = $db->prepare($sql);

        $req->bindValue(':id', $_SESSION['f3il.authentication']);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
        $total = $req->fetch(\PDO::FETCH_ASSOC);

        $sql = "SELECT COUNT(*)"
                . " FROM TR"
                . " WHERE ID = :id"
                . " AND ID_Eleve1 IS NOT NULL AND CLOTURER=0";
        $reqC = $db->prepare($sql);

        $reqC->bindValue(':id', $_SESSION['f3il.authentication']);

        try {
            $reqC->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $cours = $reqC->fetch(\PDO::FETCH_ASSOC);

        $sql = "SELECT COUNT(*)"
                . " FROM TR"
                . " WHERE ID = :id"
                . " AND ID_Eleve1 IS NULL";
        $reqNA = $db->prepare($sql);

        $reqNA->bindValue(':id', $_SESSION['f3il.authentication']);

        try {
            $reqNA->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $NonA = $reqNA->fetch(\PDO::FETCH_ASSOC);

        $sql = "SELECT COUNT(*)"
                . " FROM TR"
                . " WHERE ID = :id"
                . " AND ID_Eleve1 IS NOT NULL AND CLOTURER=1";

        $reqT = $db->prepare($sql);

        $reqT->bindValue(':id', $_SESSION['f3il.authentication']);

        try {
            $reqT->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $termine = $reqT->fetch(\PDO::FETCH_ASSOC);


        $badge = array(
            'Nb_Sujet' => $total['COUNT(*)'],
            'Nb_SujetC' => $cours['COUNT(*)'],
            'Nb_SujetNA' => $NonA['COUNT(*)'],
            'Nb_SujetT' => $termine['COUNT(*)']
        );
        return json_encode($badge);
    }

    public function BadgeAdmin() {
        $db = \F3il\Application::getDB();

        $sql = "SELECT COUNT(*)"
                . " FROM TR";
        $req = $db->prepare($sql);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
        $total = $req->fetch(\PDO::FETCH_ASSOC);


        $sql = "SELECT COUNT(*)"
                . " FROM TR"
                . " WHERE ID_Eleve1 IS NOT NULL AND CLOTURER=0";
        $reqC = $db->prepare($sql);

        try {
            $reqC->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $cours = $reqC->fetch(\PDO::FETCH_ASSOC);


        $sql = "SELECT COUNT(*)"
                . " FROM TR"
                . " WHERE ID_Eleve1 IS NULL";
        $reqNA = $db->prepare($sql);

        try {
            $reqNA->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $NonA = $reqNA->fetch(\PDO::FETCH_ASSOC);


        $sql = "SELECT COUNT(*)"
                . " FROM TR"
                . " WHERE ID_Eleve1 IS NOT NULL AND CLOTURER=1";

        $reqT = $db->prepare($sql);

        try {
            $reqT->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $termine = $reqT->fetch(\PDO::FETCH_ASSOC);


        $sql = "SELECT COUNT(*)"
                . " FROM ELEVES";

        $reqTE = $db->prepare($sql);

        try {
            $reqTE->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $TotE = $reqTE->fetch(\PDO::FETCH_ASSOC);

        $sql = "SELECT COUNT(*)"
                . " FROM ELEVES"
                . " WHERE EXISTS(SELECT CODE_TR FROM TR WHERE ID_Eleve1 = num)"
                . " OR EXISTS(SELECT CODE_TR FROM TR WHERE ID_Eleve2 = num)"
                . " OR EXISTS(SELECT CODE_TR FROM TR WHERE ID_Eleve3 = num)";

        $reqTEA = $db->prepare($sql);

        try {
            $reqTEA->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $TotEA = $reqTEA->fetch(\PDO::FETCH_ASSOC);

        $sql = "SELECT COUNT(*)"
                . " FROM ELEVES"
                . " WHERE NOT EXISTS(SELECT CODE_TR FROM TR WHERE ID_Eleve1 = num)"
                . " AND NOT EXISTS(SELECT CODE_TR FROM TR WHERE ID_Eleve2 = num)"
                . " AND NOT EXISTS(SELECT CODE_TR FROM TR WHERE ID_Eleve3 = num)";

        $reqTENA = $db->prepare($sql);

        try {
            $reqTENA->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $TotENA = $reqTENA->fetch(\PDO::FETCH_ASSOC);

        $badge = array(
            'Nb_Sujet' => $total['COUNT(*)'],
            'Nb_SujetC' => $cours['COUNT(*)'],
            'Nb_SujetNA' => $NonA['COUNT(*)'],
            'Nb_SujetT' => $termine['COUNT(*)'],
            'Nb_Eleve' => $TotE['COUNT(*)'],
            'Nb_EleveA' => $TotEA['COUNT(*)'],
            'Nb_EleveNA' => $TotENA['COUNT(*)']
        );
        return json_encode($badge);
    }

    public function creer(array $data) {
        $db = \F3il\Application::getDB();

        $sql = "INSERT INTO tr SET "
                . " id = :id"
                . ", titre = :titre"
                . ", sujet = :sujet"
        ;
        $req = $db->prepare($sql);


        $req->bindValue(':id', $_SESSION['f3il.authentication']);
        $req->bindValue(':titre', $data['titre']);
        $req->bindValue(':sujet', $data['sujet']);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
    }

    public function random() {
        $db = \F3il\Application::getDB();


        $sql = "SELECT code_tr,titre,nom,prenom "
                . "FROM tr INNER JOIN utilisateurs "
                . "ON tr.ID = utilisateurs.ID "
                . "WHERE tr.ID_Eleve1 IS NULL "
                . "ORDER BY RAND() "
                . " LIMIT 1";

        $req = $db->prepare($sql);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $array = $req->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($array as $row) {
            $donnee[] = array(
                'Enseignant' => utf8_encode($row['nom'] . " " . $row['prenom']),
                'ID' => $row["code_tr"],
                'Titre' => utf8_encode($row["titre"])
            );
        }
        return json_encode($donnee);
    }

    public function attribuer() {
        if ($_POST) {
            $db = \F3il\Application::getDB();
            /* VALUES */
            $ID_Eleve1 = $_POST['ID_Eleve1'];
            $ID_Eleve2 = $_POST['ID_Eleve2'];
            $ID_Eleve3 = $_POST['ID_Eleve3'];
            $ID_TR = $_POST['ID_TR'];

            if (ID_Eleve3 == "0") {
                $sql = "UPDATE tr "
                        . "SET ID_Eleve1 = :ID_Eleve1,ID_Eleve2 = :ID_Eleve2 "
                        . "WHERE Code_TR = :ID_TR";
                $req = $db->prepare($sql);

                $req->bindValue(':ID_Eleve1', $ID_Eleve1);
                $req->bindValue(':ID_Eleve2', $ID_Eleve2);
                $req->bindValue(':ID_TR', $ID_TR);
            } else {
                $sql = "UPDATE tr "
                        . "SET ID_Eleve1 = :ID_Eleve1,ID_Eleve2 = :ID_Eleve2,ID_Eleve3 = :ID_Eleve3 "
                        . "WHERE Code_TR = :ID_TR";
                $req = $db->prepare($sql);

                $req->bindValue(':ID_Eleve1', $ID_Eleve1);
                $req->bindValue(':ID_Eleve2', $ID_Eleve2);
                $req->bindValue(':ID_Eleve3', $ID_Eleve3);
                $req->bindValue(':ID_TR', $ID_TR);
            }

            try {
                $req->execute();
                \F3il\Messenger::setMessage("Sujet attribué avec succés !");
            } catch (\PDOException $ex) {
                die($ex->getMessage());
                throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
            }
        }
    }

    public function isActif($id) {
        $db = \F3il\Application::getDB();

        $sql = "SELECT ID_Eleve1 "
                . " FROM tr "
                . " WHERE code_tr = :id ";
        $req = $db->prepare($sql);

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $data = $req->fetch(\PDO::FETCH_ASSOC);
        if (is_null($data['ID_Eleve1'])) {
            return true;
        }
        return false;
    }
    public function isCloturer($id) {
        $db = \F3il\Application::getDB();

        $sql = "SELECT Cloturer "
                . " FROM tr "
                . " WHERE code_tr = :id ";
        $req = $db->prepare($sql);

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }

        $data = $req->fetch(\PDO::FETCH_ASSOC);
        if ($data['Cloturer']==1) {
            return true;
        }
        return false;
    }

    public function lire($id) {
        $db = \F3il\Application::getDB();
        $db->exec('SET NAMES utf8');

        $sql = "SELECT titre, sujet "
                . " FROM tr "
                . " WHERE code_tr = :id ";
        $req = $db->prepare($sql);

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    public function editer(array $data, $id) {
        $db = \F3il\Application::getDB();

        $sql = "UPDATE TR"
                . " SET Titre=:titre,Sujet=:sujet"
                . " WHERE code_tr = :id ";
        $req = $db->prepare($sql);

        $req->bindValue(':titre', $data['titre']);
        $req->bindValue(':sujet', $data['sujet']);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
    }

    public function supprimer($id) {
        $db = \F3il\Application::getDB();

        $sql = "DELETE FROM TR"
                . " WHERE code_tr = :id ";
        $req = $db->prepare($sql);

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
    }
    
    public function cloturer($id) {
        $db = \F3il\Application::getDB();

        $sql = "UPDATE TR"
                . " SET Cloturer=1"
                . " WHERE code_tr = :id ";
        $req = $db->prepare($sql);

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
    }

    public function getSuivitSujet($codetr) {
        $db = \F3il\Application::getDB();
        if ($_SESSION['f3il.authentication'] != 4) {
            $sql = "SELECT Code_TR FROM tr WHERE ID = :id";
            $req = $db->prepare($sql);
            $req->bindValue(':id', $_SESSION['f3il.authentication']);
            try {
                $req->execute();
            } catch (PDOException $ex) {
                die($ex->getMessage());
                throw new Error("Erreur SQL " . $ex->getMessage());
            }
            $array = $req->fetchAll(\PDO::FETCH_ASSOC);
            $i = 0;
            for (; $i < count($array); $i++) {
                if ($array[$i]['Code_TR'] == $codetr) {
                    break;
                }
            }
            if ($i > count($array)) {
                return null;
            }
        }
        $sql = "SELECT * "
                . "FROM tr "
                . "WHERE Code_TR = :codetr ";
        $req = $db->prepare($sql);
        $req->bindValue(':codetr', $codetr, \PDO::PARAM_INT);
        try {
            $req->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }
        $array = $req->fetchAll(\PDO::FETCH_ASSOC);
        if (count($array) == 0) {
            return null;
        }
        foreach ($array[0] as $key => $value) {
            //$value = utf8_encode($value);
            if (!isset($array2)) {
                $array2 = array($key => $value);
            } else {
                $array2 = array_merge($array2, array($key => $value));
            }
        }
        if ($array2["ID_Eleve1"] == null) {
            return null;
        }
        $sql = "SELECT Nom, Prenom "
                . "FROM eleves "
                . "WHERE num = :IDE1 "
                . "OR num = :IDE2 ";
        $sql .= (is_null($array[0]["ID_Eleve3"]) ? ";" : "OR num = :IDE3");
        $req = $db->prepare($sql);
        $req->bindValue(':IDE1', $array[0]["ID_Eleve1"], \PDO::PARAM_INT);
        $req->bindValue(':IDE2', $array[0]["ID_Eleve2"], \PDO::PARAM_INT);
        if (!is_null($array[0]["ID_Eleve3"])) {
            $req->bindValue(':IDE3', $array[0]["ID_Eleve3"], \PDO::PARAM_INT);
        }
        try {
            $req->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }
        $eleves = $req->fetchAll(\PDO::FETCH_ASSOC);
        $eleves2 = array();
        if (count($eleves) == 2) {
            $eleves2 = array("NomEleve1" => utf8_encode($eleves[0]["Nom"]),
                "PrenomEleve1" => utf8_encode($eleves[0]["Prenom"]),
                "NomEleve2" => utf8_encode($eleves[1]["Nom"]),
                "PrenomEleve2" => utf8_encode($eleves[1]["Prenom"]),);
        } else if (count($eleves) == 3) {
            $eleves2 = array("NomEleve1" => utf8_encode($eleves[0]["Nom"]),
                "PrenomEleve1" => utf8_encode($eleves[0]["Prenom"]),
                "NomEleve2" => utf8_encode($eleves[1]["Nom"]),
                "PrenomEleve2" => utf8_encode($eleves[1]["Prenom"]),
                "NomEleve3" => utf8_encode($eleves[2]["Nom"]),
                "PrenomEleve3" => utf8_encode($eleves[2]["Prenom"]));
        }
        $retour = array_merge($array2, $eleves2);
        return $retour;
    }

    public function editerSuiviSujet(array $data, $id) {

        $db = \F3il\Application::getDB();
        $sql = "UPDATE TR"
                . " SET Date_RDV1 = :daterdv1 , Commentaire_RDV1 = :commrdv1, Penalite_RDV1 = :penrdv1, "
                . "Date_RDV2 = :daterdv2, Commentaire_RDV2 = :commrdv2, Penalite_RDV1 = :penrdv2, "
                . "Date_RDV3 = :daterdv3, Commentaire_RDV3 = :commrdv3, Penalite_RDV1 = :penrdv3, "
                . "Date_RDV4 = :daterdv4, Commentaire_RDV4 = :commrdv4, Penalite_RDV1 = :penrdv4, "
                . "Note = :note"
                . " WHERE code_tr = :id ";
        $req = $db->prepare($sql);

        $dateRDV1 = $dateRDV2 = $dateRDV3 = $dateRDV4 = NULL;
        for ($i = 1; $i < 5; $i++) {
            if ($data['Date_RDV' . $i] != "") {
                ${'dateRDV' . $i} = date("Y-m-d", strtotime(str_replace('/', '-', $data['Date_RDV' . $i])));
            }
            $req->bindValue(':daterdv' . $i, ${'dateRDV' . $i});
        }
        $req->bindValue(':commrdv1', $data['Commentaire_RDV1'], \PDO::PARAM_STR);
        $req->bindValue(':penrdv1', $data['Penalite_RDV1']);

        $req->bindValue(':commrdv2', $data['Commentaire_RDV2'], \PDO::PARAM_STR);
        $req->bindValue(':penrdv2', $data['Penalite_RDV2'], \PDO::PARAM_INT);

        $req->bindValue(':commrdv3', $data['Commentaire_RDV3'], \PDO::PARAM_STR);
        $req->bindValue(':penrdv3', $data['Penalite_RDV3'], \PDO::PARAM_INT);

        $req->bindValue(':commrdv4', $data['Commentaire_RDV4'], \PDO::PARAM_STR);
        $req->bindValue(':penrdv4', $data['Penalite_RDV4'], \PDO::PARAM_INT);

        $req->bindValue(':note', $data['Note'], \PDO::PARAM_INT);

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL " . $ex->getMessage());
        }
    }

    public function SujetECAdmin() {
        $db = \F3il\Application::getDB();
        $db->exec('SET NAMES utf8');
        
        $sql = "SELECT code_tr, titre, note,abv,penalite_rdv1,penalite_rdv2,penalite_rdv3,penalite_rdv4,eleves.nom ,eleves.prenom "
                . " FROM (tr INNER JOIN utilisateurs"
                . " ON (tr.id = utilisateurs.id))"
                . " INNER JOIN eleves"
                . " ON tr.ID_Eleve1 = eleves.num"
                . " OR tr.ID_Eleve2 = eleves.num"
                . " OR tr.ID_Eleve3 = eleves.num"
                . " WHERE cloturer=0"
                . " ORDER BY code_tr ASC";

        $req = $db->prepare($sql);

        //$req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

        $array = $req->fetchAll(\PDO::FETCH_ASSOC);

        $tmp_code = $array[0]['code_tr'];
        $tmp_eleves = "";
        $tmp_titre = "";
        $tmp_note = "";
        $tmp_etap = "";
        $i = 0;
        foreach ($array as $row) {
            $i = $i + 1;
            if ($row['code_tr'] == $tmp_code && isset($array[$i])) {
                $tmp_eleves = $tmp_eleves . " " . $row["nom"] . " " . $row["prenom"] . " ";
                $tmp_titre = $row['titre'];
                if (is_null($row['note'])) {
                    $tmp_etap = 'Note';
                    if (is_null($row['penalite_rdv4'])) {
                        $tmp_etap = 'RDV4';
                        if (is_null($row['penalite_rdv3'])) {
                            $tmp_etap = 'RDV3';
                            if (is_null($row['penalite_rdv2'])) {
                                $tmp_etap = 'RDV2';
                                if (is_null($row['penalite_rdv1'])) {
                                    $tmp_etap = 'RDV1';
                                }
                            }
                        }
                    }
                } else {
                    $tmp_etap = 'Cloturation';
                }
            } else if (!isset($array[$i])) {
                $tmp_eleves = $tmp_eleves . " " . $row["nom"] . " " . $row["prenom"] . " ";
                $donnee[] = array(
                    'code_tr' => $tmp_code,
                    'titre' => $tmp_titre,
                    'eleve' => $tmp_eleves,
                    'etape_courante' => $tmp_etap
                );
                $tmp_code = $row["code_tr"];
            } else {
                $donnee[] = array(
                    'code_tr' => $tmp_code,
                    'titre' => $tmp_titre,
                    'eleve' => $tmp_eleves,
                    'etape_courante' => $tmp_etap
                );
                $tmp_code = $row["code_tr"];
                $tmp_eleves = $row["nom"] . " " . $row["prenom"];
            }
        }

        return json_encode($donnee);
    }

    public function SujetNAAdmin() {
        $db = \F3il\Application::getDB();
        $db->exec('SET NAMES utf8');

        $sql = "SELECT code_tr, titre, nom, prenom"
                . " FROM tr INNER JOIN utilisateurs"
                . " ON (tr.id = utilisateurs.id)"
                . " WHERE ID_Eleve1 IS NULL;";

        $req = $db->prepare($sql);

        try {
            $req->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

        $array = $req->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($array as $row) {
            $donnee[] = array(
                'code_tr' => $row['code_tr'],
                'titre' => $row['titre'],
                'enseignant' => $row['nom'] . " " . $row['prenom'],
            );
        }
        return json_encode($donnee);
    }

    public function SujetTAdmin() {
        $db = \F3il\Application::getDB();
        $db->exec('SET NAMES utf8');


        $sql = "SELECT code_tr, titre, note,eleves.nom , eleves.prenom, abv "
                . " FROM (tr INNER JOIN utilisateurs"
                . " ON (tr.id = utilisateurs.id))"
                . " INNER JOIN eleves"
                . " ON tr.ID_Eleve1 = eleves.num"
                . " OR tr.ID_Eleve2 = eleves.num"
                . " OR tr.ID_Eleve3 = eleves.num"
                . " WHERE Cloturer = 1"
                . " ORDER BY code_tr ASC";

        $req = $db->prepare($sql);

        try {
            $req->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

        $array = $req->fetchAll(\PDO::FETCH_ASSOC);

        $tmp_code = $array[0]['code_tr'];
        $tmp_eleves = "";
        $tmp_titre = "";
        $tmp_note = "";
        $tmp_abv = "";
        $i = 0;
        foreach ($array as $row) {
            $i = $i + 1;
            if ($row['code_tr'] == $tmp_code && isset($array[$i])) {
                $tmp_eleves = $tmp_eleves . " " . $row["nom"] . " " . $row["prenom"] . " ";
                $tmp_titre = $row['titre'];
                $tmp_abv = $row['abv'];
                $tmp_note = $row['note'];
            } else if (!isset($array[$i])) {
                $tmp_eleves = $tmp_eleves . " " . $row["nom"] . " " . $row["prenom"] . " ";
                $donnee[] = array(
                    'code_tr' => $tmp_code,
                    'titre' => $tmp_titre,
                    'eleve' => $tmp_eleves,
                    'note' => $tmp_note,
                    'abv' => $tmp_abv,
                );
                $tmp_code = $row["code_tr"];
            } else {
                $donnee[] = array(
                    'code_tr' => $tmp_code,
                    'titre' => $tmp_titre,
                    'eleve' => $tmp_eleves,
                    'note' => $tmp_note,
                    'abv' => $tmp_abv,
                );
                $tmp_code = $row["code_tr"];
                $tmp_eleves = $row["nom"] . " " . $row["prenom"];
            }
        }


        return json_encode($donnee);
    }

    public function SujetECEnseignant($id) {
        $db = \F3il\Application::getDB();
        $db->exec('SET NAMES utf8');
        
        $sql = "SELECT code_tr, titre, note,abv,penalite_rdv1,penalite_rdv2,penalite_rdv3,penalite_rdv4,eleves.nom ,eleves.prenom "
                . " FROM (tr INNER JOIN utilisateurs"
                . " ON (tr.id = utilisateurs.id))"
                . " INNER JOIN eleves"
                . " ON tr.ID_Eleve1 = eleves.num"
                . " OR tr.ID_Eleve2 = eleves.num"
                . " OR tr.ID_Eleve3 = eleves.num"
                . " WHERE cloturer=0"
                . " AND tr.id=:id"
                . " ORDER BY code_tr ASC";

        $req = $db->prepare($sql);

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

        $array = $req->fetchAll(\PDO::FETCH_ASSOC);

        $tmp_code = $array[0]['code_tr'];
        $tmp_eleves = "";
        $tmp_titre = "";
        $tmp_note = "";
        $tmp_etap = "";
        $i = 0;
        foreach ($array as $row) {
            $i = $i + 1;
            if ($row['code_tr'] == $tmp_code && isset($array[$i])) {
                $tmp_eleves = $tmp_eleves . " " . $row["nom"] . " " . $row["prenom"] . " ";
                $tmp_titre = $row['titre'];
                if (is_null($row['note'])) {
                    $tmp_etap = 'Note';
                    if (is_null($row['penalite_rdv4'])) {
                        $tmp_etap = 'RDV4';
                        if (is_null($row['penalite_rdv3'])) {
                            $tmp_etap = 'RDV3';
                            if (is_null($row['penalite_rdv2'])) {
                                $tmp_etap = 'RDV2';
                                if (is_null($row['penalite_rdv1'])) {
                                    $tmp_etap = 'RDV1';
                                }
                            }
                        }
                    }
                } else {
                    $tmp_etap = 'Cloturation';
                }
            } else if (!isset($array[$i])) {
                $tmp_eleves = $tmp_eleves . " " . $row["nom"] . " " . $row["prenom"] . " ";
                $donnee[] = array(
                    'code_tr' => $tmp_code,
                    'titre' => $tmp_titre,
                    'eleve' => $tmp_eleves,
                    'etape_curr' => $tmp_etap
                );
                $tmp_code = $row["code_tr"];
            } else {
                $donnee[] = array(
                    'code_tr' => $tmp_code,
                    'titre' => $tmp_titre,
                    'eleve' => $tmp_eleves,
                    'etape_curr' => $tmp_etap
                );
                $tmp_code = $row["code_tr"];
                $tmp_eleves = $row["nom"] . " " . $row["prenom"];
            }
        }


        return json_encode($donnee);
        

    }

    public function SujetNAEnseignant($id) {
        $db = \F3il\Application::getDB();

        $sql = "SELECT code_tr, titre "
                . " FROM tr INNER JOIN utilisateurs"
                . " ON (tr.id = utilisateurs.id)"
                . " WHERE ID_Eleve1 IS NULL AND"
                . " tr.id = :id";

        $req = $db->prepare($sql);

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

        $array = $req->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($array as $row) {
            $donnee[] = array(
                'code_tr' => $row["code_tr"],
                'titre' => utf8_encode($row['titre'])
            );
        }
        return json_encode($donnee);
    }

    public function SujetTEnseignant($id) {
        $db = \F3il\Application::getDB();

        $sql = "SELECT code_tr, titre, note,eleves.nom ,eleves.prenom "
                . " FROM (tr INNER JOIN utilisateurs"
                . " ON (tr.id = utilisateurs.id))"
                . " INNER JOIN eleves"
                . " ON tr.ID_Eleve1 = eleves.num"
                . " OR tr.ID_Eleve2 = eleves.num"
                . " OR tr.ID_Eleve3 = eleves.num"
                . " WHERE CLOTURER=1 AND"
                . " tr.id = :id"
                . " ORDER BY code_tr ASC";

        $req = $db->prepare($sql);

        $req->bindValue(':id', $id, \PDO::PARAM_INT);

        try {
            $req->execute();
        } catch (PDOException $ex) {
            die($ex->getMessage());
            throw new Error("Erreur SQL " . $ex->getMessage());
        }

        $array = $req->fetchAll(\PDO::FETCH_ASSOC);

        $tmp_code = $array[0]['code_tr'];
        $tmp_eleves = "";
        $tmp_titre = "";
        $tmp_note = "";
        $i = 0;
        foreach ($array as $row) {
            $i = $i + 1;
            if ($row['code_tr'] == $tmp_code && isset($array[$i])) {
                $tmp_eleves = $tmp_eleves . " " . $row["nom"] . " " . $row["prenom"] . " ";
                $tmp_titre = $row['titre'];
                $tmp_note = $row['note'];
            } else if (!isset($array[$i])) {
                $tmp_eleves = $tmp_eleves . " " . $row["nom"] . " " . $row["prenom"] . " ";
                $donnee[] = array(
                    'code_tr' => $tmp_code,
                    'titre' => utf8_encode($tmp_titre),
                    'eleve' => $tmp_eleves,
                    'note' => $tmp_note,
                );
                $tmp_code = $row["code_tr"];
            } else {
                $donnee[] = array(
                    'code_tr' => $tmp_code,
                    'titre' => utf8_encode($tmp_titre),
                    'eleve' => $tmp_eleves,
                    'note' => $tmp_note,
                );
                $tmp_code = $row["code_tr"];
                $tmp_eleves = $row["nom"] . " " . $row["prenom"];
            }
        }


        return json_encode($donnee);
    }

}
