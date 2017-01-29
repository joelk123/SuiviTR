<?php
defined('__SuiviTR__') or die('Acces interdit');
?>
<div class="page-header">
    <h1>Ajouter un enseignant :</h1>
</div>
<?php if (\F3il\Messenger::hasMessage()): ?>
    <p>
    <div class="alert alert-success" role="success" class="alert-view">
        <?php echo(\F3il\Messenger::getMessage()); ?>
    </div>
    </p>
<?php endif;
?>
<?php print_r($this->form->render()); ?>
