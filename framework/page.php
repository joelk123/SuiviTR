<?php

namespace F3il;

defined('__F3IL__') or die('Accès interdit !!');

class Page {
    
    private static $_instance;
    protected $template= '';
    protected $view= '';
    protected $data= array();
    protected $scripts= array();


    /**
    * Constructeur privé
    */
    private function __construct(){  
    }
    
    /**
     * Retourne l'instance de la classe Page
     * @return self
     */
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance= new Page();
        }
        return self::$_instance;
    }
    
    /**
    * Spécifie le nom du template à utiliser
    * @param type $templateName
    */
    public function setTemplate($templateName){
        $templatePath= APPLICATION_PATH."/templates/".$templateName.'.template.php';
        if(!is_readable($templatePath)){
            throw new Error('Fichier de template introuvable ou illisible !!');
        }
        $this->template = $templatePath;
    }
    
    /**
    * Spécifie le nom de la vue à utiliser
    * @param type $viewName
    */
    public function setView($viewName){
        $viewPath= APPLICATION_PATH."/views/".$viewName.'.view.php';
        if(!is_readable($viewPath)){
            throw new Error('Fichier de vue introuvable ou illisible !!');
        }
        $this->view = $viewPath;
    }
    
    /**
    * Insère la vue dans le template
    */
    private function insertView(){
        if(!empty($this->view))
        {
            require $this->view;
        }
    }
    
    /**
    * Déclenche le rendu du template
    */
    public function render(){
        if(!empty($this->template) && !empty($this->view))
        {
            require $this->template;
        }
    }
    
    /**
    * Méthode magique pour l'ajout de propriété
    * @param string $name
    * @param mixed $value
    */
    public function __set($name, $value){
        $this->data[$name]= $value;
    }
    
    /**
    * Méthode magique pour la lecture d'une propriété
    * @param string $name
    * @return mixed
    */
    public function __get($name) {
        if(!isset($this->data[$name])){
            throw new Error('La propriété '.$name.' est introuvable !!');
        }
        return $this->data[$name];
    }
    
    /**
    * Méthode magique pour les tests avec isset
    * @param string $name
    * @return booleane
    */
    public function __isset($name){
        return isset($this->data[$name]);
    }
    
    /**
    * Méthode de transfert d'un tableau vers des propriétés
    * @todo écrire le code de la méthode
    * @param array $data
    */
    public function loadData(array $data){
        
    }
    
    /**
    * Méthode d'ajout de scripts
    * @param $script
    */
    public function addScript($script){
        if(!is_readable($script)){
            throw new Error('Fichier'.$script.' introuvable.');
        }
        
        if(!in_array($script, $this->scripts)){
            $this->scripts[]= $script;
        }
    }
    
    /**
    * Méthode d'insertion de scripts
    */
    public function insertScript(){
        foreach ($this->scripts as $script){
            ?>
                <script type="text/javascript" src="<?php echo $script; ?>"></script>
            <?php
        }
    }
    
}
