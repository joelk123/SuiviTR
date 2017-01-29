<?php
namespace F3il;
defined('__F3IL__') or die('Accès intrerdit');

class Database
{
    private static $_instance;
    private $db;
    
    private function __construct($hostname,$login,$password,$database)
    {
        try
        {
            $this->db=new \PDO("mysql:host=$hostname;dbname=$database",$login, $password);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch(\PDOException $ex)
        {
            throw new Error("Erreur de connexion à la base de données : ".$ex->getMessage());
        }
    }
    /*
     * @return PDO
     */
    public static function getInstance($hostname,$login,$password,$database)
    {
        if(is_null(self::$_instance))
        {
            self::$_instance=new Database($hostname,$login,$password,$database);
            return self::$_instance->db;
        }
        else
        {
            return self::$_instance->db;
        }
    }
}