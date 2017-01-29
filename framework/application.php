<?php    
    namespace F3il;
    defined('__F3IL__') or die('Acces interdit');
    
    /**
     * Classe représéntant l'application Web
     * Contrôleur frontal
     */
    class Application 
    {
        private static $_instance = null;
        private $configuration = null;
        private $currentController;
        private $currentAction;
        private $defaultController;

        /**
         * Constructeur privé (singleton)
         * 
         * @param string $fichierIni : chemin du fichier ini
         * 
         */
        private function __construct($fichierIni) {
            $this->configuration=  \F3il\Configuration::getInstances($fichierIni);
        }
        
        
        /**
         * Fabrique et/ou retourne l'unique instance d'application
         * 
         * @param string $fichierIni : chemin du ficheir ini
         * @return Application
         */
        public static function getInstance($fichierIni) { 
            if(is_null(self::$_instance))
            {
                self::$_instance=new Application($fichierIni);
                return self::$_instance;
            }
            else
            {
                return self::$_instance;
            }
        }
        
        /**
         * Lance l'exécution de l'application
         */
        public function run() {  
            /*
            $this->currentController=Request::get('controller',$this->defaultController);
            $c='\\'.APPLICATION_NAMESPACE.'\\'.ucfirst($this->currentController).'Controller';
            $con=new $c();
            $this->currentAction=Request::get('action', $con->getDefaultActionName());
            $con->execute($this->currentAction);
            self::getPage()->render();*/
            $this->currentController=Request::get('controller',$this->defaultController);
            
            $className="\\".APPLICATION_NAMESPACE."\\".ucfirst(Request::get('controller',  $this->defaultController))."Controller";
            $Instance_class =new $className;

            $this->currentAction = Request::get('action',  $Instance_class->getDefaultActionName());
            
            $Instance_class->execute($this->currentAction);
            $page = Page::getInstance();
            $page->render();
        }
        
        /**
         * Retourne la configuration chargée par l'application
         * 
         * @return Configuration
         */
        public static function getConfig() {
            if(!is_null(self::$_instance))
            {
                return self::$_instance->configuration;
            }
            else
            {
                return null;
            }
        }
        
        /**
         * Retourne la connexion à la base de donnée
         * 
         * @return PDO
         */
        public static function getDB() {
            $conf= \F3il\Application::getConfig();
            return \F3il\Database::getInstance($conf->db_hostname, $conf->db_login,$conf->db_password, $conf->db_database);
        } 
        
        /**
         * Retourne la page à afficher
         * 
         * @return Page
         */
        public static function getPage() {   
            return \F3il\Page::getInstance();
        }
        
        /**
         * Setter pour le contrôleur par défaut
         * 
         * @param string $controller
         */
        public function setDefaultController($controller) {  
            $this->defaultController=$controller;
        }
        public function setAuthenticationDelegate($delegateClass){
            $chemin = "\\".APPLICATION_NAMESPACE."\\".$delegateClass;
            $obj = new $chemin();
            Authentication::getInstance($obj);
        }
		
    }
