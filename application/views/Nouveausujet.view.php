<?php
defined('__SuiviTR__') or die('Acces interdit');
?>
<script src="./library/ckeditor/ckeditor.js"  type="text/javascript"></script>
<div class="col-md-7">
    <div class="page-header">
        <h1>Nouveau sujet :</h1>
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
</div>