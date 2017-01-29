<?php
namespace F3il;

defined('__F3IL__') or die('Acces interdit');

class Authentication {    
    protected $user;
    protected $authModel = null;
    
    private static $_instance = null;
    
    const SESSION_KEY = "f3il.authentication";
    
    
    /**
     * Constructeur
     * @param \F3il\AuthenticationDelegate $authModel
     */
    private function __construct(AuthenticationDelegate $authModel) {
        $this->authModel = $authModel;
    }
    
    /**
     * Récupérateur d'instance
     * 
     * @param \F3il\AuthenticationDelegate $authModel
     * @return \F3il\Authentication
     * @throws Error
     */
    public static function getInstance(AuthenticationDelegate $authModel=null){
        if(is_null(self::$_instance)){
            if(is_null($authModel)){
                throw new Error('Modèle délégué non fourni');
            }
            self::$_instance = new Authentication($authModel);
        }
        self::$_instance->loadUserData();
        return self::$_instance;
    }
    
    
    /**
     * Méthode d'encodage du mot de passe
     * 
     * @param string $password : mot de passe
     * @param string $salt : sel
     * @return string : mot de passe encodé
     */
    public static function hash($password,$salt) {
        return hash('sha256',hash('sha256',$salt).$password);
    }
    
    /**
     * Méthode de vérification de l'identité
     * 
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public static function login($login,$password) {
        $saltCol = self::$_instance->authModel->auth_getSaltColumn();
        $passwordCol = self::$_instance->authModel->auth_getPasswordColumn();
        $idCol = self::$_instance->authModel->auth_getIdColumn();

        $user = self::$_instance->authModel->auth_getUserByLogin($login);

        if(self::hash($password,$user[$saltCol])!=$user[$passwordCol]) return false;
        $_SESSION[self::SESSION_KEY] = $user[$idCol];
        return true;
    }
    
    /**
     * Charge les données utilisateur
     * @return void
     */
    public function loadUserData() {
        $userId = Request::session(self::SESSION_KEY);
        if(is_null($userId)) return;
        $this->user = $this->authModel->auth_getUserById($userId);
    }

    /**
     * Réalise la déconnexion de l'utilisateur
     */
    public static function logout() {
        self::$_instance->user = null;
        unset($_SESSION[self::SESSION_KEY]);
    }

    /**
     * Retourne si un utilisateur est connecté
     * 
     * @return boolean
     */
    public static function isAuthenticated() {
        return !(is_null(self::$_instance->user));
    }

    /**
     * Retourne les données utilisateur chargées
     * @return array
     */
    public static function getUserData() {
        return self::$_instance->user;
    }

    /**
     * Retourne l'id de l'utilisateur connecté
     * 
     * @return int
     */
    public static function getUserId() {
        $idCol = self::$_instance->authModel->auth_getIdColumn();
        return self::$_instance->user[$idCol];
    }    
}