<?php

namespace Suivitr;
defined('__F3IL__') or die('Acces interdit');

use \F3il\Field;
use \F3il\Form;

class LoginForm extends \F3il\Form
{
    public function __construct($destination,$mode=Form::CREATE_MODE)
    {
        parent::__construct($destination,$mode);
        $this->addFormField(new \F3il\Field('login','Utilisateur','',true,FILTER_SANITIZE_STRING));
        $this->addFormField(new \F3il\Field('password','Mot de passe','',true,FILTER_SANITIZE_STRING));
       
    }
    
     public function render()
    {   
        $messages = $this->getMessages();
        if (count($messages)>0):?>
            <p>
                <?php   
                $tmp_mess = each($messages);
                ?><div class="alert alert-danger" role="alert">
                    <?php echo($tmp_mess[1]); ?>
                </div><?php
                ?>
            </p>
        <?php endif;
        
        ?>
        
        <form method="POST" action="" >
            <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($this->login);?>" required placeholder="Utilisateur">
            <input type="password" id="password" name="password" required placeholder="Mot de Passe">
            <input type="submit" class="login-submit" value="Se Connecter">
            <?php //\F3il\CsrfHelper::csrf(); ?>
        </form>
        <?php 
    }
    
     public function loginValidate(){
        $valid= filter_var(strlen($this->login) > 5) && preg_match('/^[^\W]+$/', $this->login);
        if(!$valid){
            $this->addMessage('login', 'Le Login doit faire plus de 5 caractères et contenir aucun caractères spéciaux');
        }
        return $valid;
    }
    
    public function passwordValidate(){
        $valid= filter_var(strlen($this->password) > 5);
        if(!$valid){
            $this->addMessage('password', 'Mot de passe trop court, 6 caractères minimum');
        }
        return $valid;
    }
   public function _editValidate(){
        $valid =$this->loginValidate() && $this->motdepasseValidate();
        
        return $valid;
    }
    
}