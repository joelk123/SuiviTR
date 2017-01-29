<?php
    namespace Suivitr;
    
    class LoginController extends \F3il\Controller 
    {
        function __construct() {
            $this->setDefaultActionName('login');
        }
        public function loginAction() {
            $page = \F3il\Page::getInstance();
            $page->setTemplate('index');
            $page->setView('login');
            
            $form = new LoginForm('',\F3IL\Form::CREATE_MODE);
            $page->form=$form;
            
            if (!\F3il\Request::isPost()) {
            return;
            }
            
            //if(!\F3il\CsrfHelper::checkToken()) {throw new \F3il\Error("Erreur formulaire");}
            
            $form->loadData($_POST);
            if(!$form->_validate()) {
            return;
            }
            
            if(!\F3il\Authentication::login($form->login,$form->password)){
            $form->addMessage('login', 'Il y a une erreur dans la saisie de votre nom d\'utilisateur ou de votre mot de passe.');
            }
            $model = new LoginModel();
            if($model->UserAdmin($_SESSION['f3il.authentication'])==1){
                \F3il\HttpHelper::redirect("?controller=admin");
            }
            else{
                \F3il\HttpHelper::redirect("?controller=enseignants");
            }
            
            
        }
    }