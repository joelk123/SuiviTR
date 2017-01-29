<?php

namespace Suivitr;

defined('__F3IL__') or die('Acces interdit');

use \F3il\Field;
use \F3il\Form;

class NouveausujetForm extends \F3il\Form {

    public function __construct($destination, $mode = Form::CREATE_MODE) {
        parent::__construct($destination, $mode);
        $this->addFormField(new \F3il\Field('titre', 'Titre', '', true, FILTER_SANITIZE_STRING));
        $this->addFormField(new \F3il\Field('sujet', 'Sujet', '', true));
    }

    public function render() {
        $messages = $this->getMessages();
        if (count($messages) > 0):
            ?>
            <p>
                <?php
                $tmp_mess = each($messages);
                ?><div class="alert alert-danger alert-view" role="alert">
                <?php echo($tmp_mess[1]); ?>
            </div><?php ?>
            </p>
        <?php endif;
        ?>

        <form action="<?php echo $this->_destination; ?>" method="post">
            <div class="form-group">
                <label>Titre :</label>
                <input class="form-control" name="titre" required><br/>
                <label>Sujet :</label>
                <textarea class="form-control" name="sujet" id="sujet" rows="7" required></textarea>
            </div><br/>
            <button class="btn btn-primary" value="submit">Sauver</button>
            <a href="javascript:history.go(-1)" class="btn btn-primary">Annuler</a>
        </form>
        <script>
            CKEDITOR.replace('sujet');
        </script>
        <?php
    }

    public function titreValidate() {
        $valid = filter_var(strlen($this->titre) > 5);
        if (!$valid) {
            $this->addMessage('titre', 'Le Titre doit faire plus de 5 caractères.');
        }
        return $valid;
    }

    public function _editValidate() {
        $valid = $this->titreValidate();

        return $valid;
    }

}
