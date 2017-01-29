<?php
namespace Suivitr;
defined('__SuiviTR__') or die('Acces interdit');

class LoginModel implements \F3il\AuthenticationDelegate{
    public function lire($id){
        $db = \F3il\Application::getDB();
        
        $sql = "SELECT nom, prenom, login, password,abv,admin,creation "
                ." FROM utilisateurs "
                . " WHERE id = :id ";
        $req = $db->prepare($sql);
        
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        
        try {
            $req->execute();                
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
        }
        
        return $req->fetch(\PDO::FETCH_ASSOC);
    }
    public function UserAdmin($id){
        $db = \F3il\Application::getDB();   
        $sql = "SELECT admin from utilisateurs where id= :id ;";
        $req = $db->prepare($sql);
        
        $req->bindValue(':id',$id,\PDO::PARAM_INT);
        try {
            $req->execute();                
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
        }
        $tmp_req = $req->fetch(\PDO::FETCH_ASSOC);
        return $tmp_req['admin'];
    }
    public function auth_getUserByLogin($login){
        $db = \F3il\Application::getDB();   
        $sql = "SELECT id,login,password,nom,prenom,abv,admin,creation from utilisateurs where login= :login ;";
        $req = $db->prepare($sql);
        
        $req->bindValue(':login',$login,\PDO::PARAM_STR);
        try {
            $req->execute();                
        } catch (\PDOException $ex) {
            throw new \F3il\Error("Erreur SQL ".$ex->getMessage());
        }
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    public function auth_getIdColumn() {
        return 'id';
    }

    public function auth_getLoginColumn() {
        return 'login';
    }

    public function auth_getPasswordColumn() {
        return 'password';
    }

    public function auth_getSaltColumn() {
        return 'creation';
    }

    public function auth_getUserById($id) {
        return $this->lire($id);
    }

}
