<?php
defined('__SuiviTR__') or die('Acces interdit');
?>
<div class="col-md-7">
    <div class="page-header">
        <h1>Attribuer un sujet :</h1>
    </div>
    <?php if (\F3il\Messenger::hasMessage()): ?>
        <p>
        <div class="alert alert-success" role="success" class="alert-view">
            <?php echo(\F3il\Messenger::getMessage()); ?>
        </div>
    </p>
<?php endif;
?>
<script src="./js/SearchBar_Eleve.js" type="text/javascript"></script>
<script src="./js/RandomSujet.js" type="text/javascript"></script>
<script src="./js/AttribuerSujet.js" type="text/javascript"></script>
<!--        <form action="" method="post">-->
<div class="form-group">
    <label>Elève 1 :</label>
    <div id="SearchBar-Attribuer-Eleve1" class="form-control"></div>
<!--                        <input class="form-control eleve1" id="eleve1">-->
    <button class="btn btn-primary btn-attribuer" id="resetE1">Effacer</button><br/>
    <label>Elève 2 :</label>
    <div id="SearchBar-Attribuer-Eleve2" class="form-control"></div>
<!--                        <input class="form-control" id="eleve2">-->
    <button class="btn btn-primary btn-attribuer" id="resetE2">Effacer</button><br/>
    <label>Elève 3 :</label>
    <div id="SearchBar-Attribuer-Eleve3" class="form-control"></div>
<!--                        <input class="form-control" id="eleve3">-->
    <button class="btn btn-primary btn-attribuer" id="resetE3">Effacer</button><br/>
    <label>Enseignant :</label>
    <input class="form-control" id="enseignant" READONLY ><button class="btn btn-primary btn-attribuer" id="RandomSujet">Sujet</button><br/>
    <label>Numéro :</label>
    <input class="form-control" id="code_tr" READONLY><br/>
    <label>Sujet :</label>
    <input class="form-control" id="titre" rows="7" READONLY></input>
</div><br/>
<button class="btn btn-primary" id="SauverAttri" value="submit">Sauver</button>
<a href="?controller=admin&action=SujetC" class="btn btn-primary">Annuler</a>
</div>