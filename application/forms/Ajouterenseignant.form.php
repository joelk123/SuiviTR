<?php
namespace Suivitr;
defined('__F3IL__') or die('Acces interdit');

use \F3il\Field;
use \F3il\Form;

class AjouterenseignantForm extends Form{
    
    public function __construct($destination, $mode=Form::EDIT_MODE) {
        parent::__construct($destination, $mode);
        $this->addFormField(new Field('nom', 'Nom','',true, FILTER_SANITIZE_STRING));
        $this->addFormField(new Field('prenom', 'Prénom','',true, FILTER_SANITIZE_STRING));
        $this->addFormField(new Field('abv', 'Abréviation','',true, FILTER_SANITIZE_STRING));
        $this->addFormField(new Field('login', 'Login','',true, FILTER_SANITIZE_STRING));
        $this->addFormField(new Field('motdepasse', 'Mot de passe','',true, FILTER_SANITIZE_STRING));
        $this->addFormField(new Field('confirmation', 'Confirmation','',true, FILTER_SANITIZE_STRING));
    }
   
    public function render() {
        
        $messages = $this->getMessages();
        if (count($messages)>0):?>
            <p>
                <?php   
                $tmp_mess = each($messages);
                ?><div class="alert alert-danger alert-view" role="alert">
                    <?php echo($tmp_mess[1]); ?>
                </div><?php
                ?>
            </p>
        <?php endif;
        
        ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="<?php echo $this->_destination; ?>" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 control-label" for="nom"> <?php echo htmlspecialchars($this->_fields['nom']->label);?></label>
                            <div class="col-md-7 col-sm-7">
                                <input class="form-control" id="nom" name="nom" type="text" value="<?php echo htmlspecialchars($this->nom);?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 control-label" for="prenom"> <?php echo htmlspecialchars($this->_fields['prenom']->label);?></label>
                            <div class="col-md-7 col-sm-7">
                                <input class="form-control" id="prenom" name="prenom" type="text" value="<?php echo htmlspecialchars($this->prenom);?>"/>
                            </div>   
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 control-label" for="abv"> <?php echo htmlspecialchars($this->_fields['abv']->label);?></label>
                            <div class="col-md-7 col-sm-7">
                                <input class="form-control" id="abv" name="abv" type="abv" value="<?php echo htmlspecialchars($this->abv);?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 control-label" for="login"> <?php echo htmlspecialchars($this->_fields['login']->label);?></label>
                            <div class="col-md-7 col-sm-7">
                                <input class="form-control" id="login" name="login" type="text" value="<?php echo htmlspecialchars($this->login);?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 control-label" for="motdepasse"> <?php echo htmlspecialchars($this->_fields['motdepasse']->label);?></label>
                            <div class="col-md-7 col-sm-7">
                                <input class="form-control" id="motdepasse" name="motdepasse" type="password" value="<?php echo htmlspecialchars($this->motdepasse);?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 col-sm-2 control-label" for="confirmation"> <?php echo htmlspecialchars($this->_fields['confirmation']->label);?></label>
                            <div class="col-md-7 col-sm-7">
                                <input class="form-control" id="confirmation" name="confirmation" type="password" value="<?php echo htmlspecialchars($this->confirmation);?>"/>
                            </div>
                        </div>
                        <div class="form-group col-md-9" style="margin-left: 5px;">
                            <button type="submit" class="btn btn-primary pull-right">Envoyer</button>
                        </div>
                        <?php                        \F3il\CsrfHelper::csrf(); ?>
                    </form>
                </div>
            </div>
        <?php
    }
    
    public function nomValidate(){
        $valid = (strlen($this->nom) < 256);
        
        if(!$valid){
            $this->addMessage ('nom', 'Nom trop long, 256 caractères maximum.');
        }
        return $valid;
    }
    
    public function prenomValidate(){
        $valid = (strlen($this->prenom) < 256);
        
        if(!$valid){
            $this->addMessage ('prenom', 'Prénom trop long, 256 caractères maximum.');
        }
        return $valid;
    }
    
    public function abvValidate(){
        $valid = (strlen($this->abv) < 4);
        
        if(!$valid){
            $this->addMessage ('abv', 'Abréviation trop longue, 3 caractères maximum.');
        }
        return $valid;
    }
    
    public function loginValidate(){
        $valid = filter_var($this->login, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z0-9_]*$/'))) && strlen($this->login) > 5;
    
        if(!$valid){
            $this->addMessage ('login', 'Login trop court (5 caractères minimum) ou contenant des caractères spéciaux.');
        }
        return $valid;
    }
    
    public function motdepasseValidate(){
        $valid = strlen($this->motdepasse) >= 6;
        
        if(!$valid){
            $this->addMessage ('motdepasse', 'Mot de passe trop court, 6 caractères minimum.');
        }
        return $valid;
    }
    
    public function confirmationValidate(){
        $valid = $this->confirmation == $this->motdepasse;
        
        if(!$valid){
            $this->addMessage ('confirmation', 'La confirmation du mot de passe ne correspond pas.');
        }
        return $valid;
    }
    
    public function _editValidate() {
        $valid = $this->nomValidate() && $this->prenomValidate() && filter_var($this->email,FILTER_VALIDATE_EMAIL) && $this->loginValidate();
        
        if(!empty($this->motdepasse) || !empty($this->confirmation)){
            $valid = $valid && $this->motdepasseValidate() && $this->confirmationValidate();
        }
        
        return $valid;
    }
}