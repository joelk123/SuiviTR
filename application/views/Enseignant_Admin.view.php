<?php
defined('__SuiviTR__') or die('Acces interdit');
?>

<div class="page-header">
    <h1>Les enseignants :</h1>
    <a href="?controller=admin&action=AjouterEnseignant" class="btn btn-primary btn-enseignant-admin">Ajouter</a>
</div>
<?php if (\F3il\Messenger::hasMessage()): ?>
    <p>
    <div class="alert alert-success" role="success" class="alert-view">
        <?php echo(\F3il\Messenger::getMessage()); ?>
    </div>
    </p>
<?php endif;
?>
<div id="jqxgrid" class = "jqxgrid"></div>
<script src="./library /jqwidgets/jqxgrid.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxgrid.selection.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxgrid.pager.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxlistbox.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxdropdownlist.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxgrid.sort.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxmenu.js" type="text/javascript"></script>
<link href="./library/jqwidgets/styles/jqx.bootstrap.css" rel="stylesheet" type="text/css"/>

<script src="./js/Enseignant_Admin.js" type="text/javascript"></script>



