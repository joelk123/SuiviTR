<?php

namespace Suivitr;

defined('__F3IL__') or die('Acces interdit');

use \F3il\Field;
use \F3il\Form;

class SuivisujetForm extends \F3il\Form {

    private $isadmin, $readonly;

    public function __construct($destination, $mode = Form::CREATE_MODE, $isadmin) {
        parent::__construct($destination, $mode);
        $this->addFormField(new \F3il\Field('Code_TR', 'Code_TR', '', true, FILTER_SANITIZE_NUMBER_INT));
        $this->addFormField(new \F3il\Field('Titre', 'Titre', '', true, FILTER_SANITIZE_STRING));
        $this->addFormField(new \F3il\Field('Sujet', 'Sujet', '', true));

        $this->addFormField(new \F3il\Field('NomEleve1', 'NomEleve1', '', true, FILTER_SANITIZE_STRING));
        $this->addFormField(new \F3il\Field('PrenomEleve1', 'PrenomEleve1', '', true, FILTER_SANITIZE_STRING));
        $this->addFormField(new \F3il\Field('NomEleve2', 'NomEleve2', '', true, FILTER_SANITIZE_STRING));
        $this->addFormField(new \F3il\Field('PrenomEleve2', 'PrenomEleve2', '', true, FILTER_SANITIZE_STRING));
        $this->addFormField(new \F3il\Field('NomEleve3', 'NomEleve3', '', true, FILTER_SANITIZE_STRING));
        $this->addFormField(new \F3il\Field('PrenomEleve3', 'PrenomEleve3', '', true, FILTER_SANITIZE_STRING));

        $this->addFormField(new \F3il\Field('Date_RDV1', 'Date_RDV1', '', true));
        $this->addFormField(new \F3il\Field('Commentaire_RDV1', 'Commentaire_RDV1', '', true));
        $this->addFormField(new \F3il\Field('Penalite_RDV1', 'Penalite_RDV1', '0', true));

        $this->addFormField(new \F3il\Field('Date_RDV2', 'Date_RDV2', '', true));
        $this->addFormField(new \F3il\Field('Commentaire_RDV2', 'Commentaire_RDV2', '', true));
        $this->addFormField(new \F3il\Field('Penalite_RDV2', 'Penalite_RDV2', '0', true));

        $this->addFormField(new \F3il\Field('Date_RDV3', 'Date_RDV3', '', true));
        $this->addFormField(new \F3il\Field('Commentaire_RDV3', 'Commentaire_RDV3', '', true));
        $this->addFormField(new \F3il\Field('Penalite_RDV3', 'Penalite_RDV3', '0', true));

        $this->addFormField(new \F3il\Field('Date_RDV4', 'Date_RDV4', '', true));
        $this->addFormField(new \F3il\Field('Commentaire_RDV4', 'Commentaire_RDV4', '', true));
        $this->addFormField(new \F3il\Field('Penalite_RDV4', 'Penalite_RDV4', '0', true));

        $this->addFormField(new \F3il\Field('Note', 'Note', '', true));

        $this->isadmin = $isadmin;
        if ($this->isadmin) {
            $this->readonly = "readonly";
        } else {
            $this->readonly = "";
        }
        $this->tabRDV = array(
            "RDV1" => array("Définition du sujet et contexte d'étude"),
            "RDV2" => array("Références bibliographiques et plan général"),
            "RDV3" => array("Validation du plan et des diapositives"),
            "RDV4" => array("Note et commentaires")
        );
    }

    public function render() {
        ?>
        <link rel="stylesheet" href="./library/jqwidgets/styles/jqx.bootstrap.css" type="text/css" />
        <script src="./library/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxdatetimeinput.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxcalendar.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxtooltip.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/globalization/globalize.js"></script>
        <link rel="stylesheet" href="./library/jqwidgets/styles/jqx.base.css" type="text/css" />
        <script type="text/javascript" src="./library/jqwidgets/jqxslider.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxpanel.js"></script>     
        <div class="col-md-10">
            <form action="<?php echo $this->_destination; ?>" method="post">
                <div class="page-header">
                    <h1>Suivi TR</h1>
                    <div class="col-lg-offset-8 button ">
                        <?php if (!$this->isadmin) { ?>
                            <div class="btn-suiviSujet">
                                <button class="btn btn-primary " title="Sauver" value="submit">
                                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                                </button>
                                <a href="javascript:history.back()" title="Annuler"   class="btn btn-primary">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </a>
                                <button class="btn btn-primary" title="Cloturer"   id="Btn-Cloturer-Sujet" type="button">
                                    <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                </button>
                                <script type="text/javascript">
                                    $("#Btn-Cloturer-Sujet").click(function () {
                                        location.href = '?controller=enseignants&action=cloturersujet&id=' + <?php echo $this->Code_TR ?>;

                                    });
                                </script>
                            </div>
                            <?php
                        } else {
                            ?>
                            <a href="javascript:history.back()" title="Annuler" style="margin-top: -60px;margin-left: 230px;" class="btn btn-primary">
                                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <script type="text/javascript">
                    function change_onglet(name) {
                        document.getElementById('li_onglet_' + anc_onglet).className =
                                document.getElementById('li_onglet_' + anc_onglet).className.replace(/(?:^|\s)active(?!\S)/g, '');
                        document.getElementById('li_onglet_' + name).className += " active";
                        document.getElementById('contenu_onglet_' + anc_onglet).style.display = 'none';
                        document.getElementById('contenu_onglet_' + name).style.display = 'block';
                        anc_onglet = name;
                    }
                </script>
                <ul class="nav nav-tabs">
                    <li class="active" id="li_onglet_Home"><a data-toggle="tab" id="onglet_Home" onclick="javascript:change_onglet('Home');">Home</a></li>
                    <?php
                    foreach ($this->tabRDV as $key => $value) {
                        ?>
                        <li id="li_onglet_<?php echo $key; ?>" ><a data-toggle="tab" id="onglet_<?php echo $key; ?>" onclick="javascript:change_onglet('<?php echo $key; ?>');"><?php echo $key; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="tab-content">
                    <div id="contenu_onglet_Home" class="contenu_onglet_Home form-group panel panel-primary tab-pane fade in active">
                        <div class="panel-heading">
                            <label>Home</label>
                        </div>
                        <div class="panel-body">
                            <label>Titre :</label>
                            <input readonly class="form-control" name="Titre"  value="<?php echo utf8_encode($this->Titre) ?>" required><br/>
                            <label>Sujet :</label>
                            <textarea readonly id="SujetCK" class="form-control" name="Sujet" rows="4" required></textarea><br/>
                            <script>
                                CKEDITOR.replace('SujetCK');
                                CKEDITOR.instances['SujetCK'].setData('<?php echo $this->Sujet ?>');
                            </script>
                            <label>Eleves :</label><br/>
                            <h4><span class="label label-primary"><input readonly  name="NomEleve1" class="label-SuiviSujet" value="<?php echo $this->NomEleve1 . " " . $this->PrenomEleve1; ?>"/></span>
                                <span class="label label-primary"><input readonly name="NomEleve2" class="label-SuiviSujet"  value="<?php echo $this->NomEleve2 . " " . $this->PrenomEleve2; ?>"/></span>

                                <?php
                                if ($this->NomEleve3 != "") {
                                    echo '<span class="label label-primary"><input readonly name="NomEleve3" class="label-SuiviSujet" value="' . $this->NomEleve3 . " " . $this->PrenomEleve3 . '"/></span>';
                                }
                                ?></h4><br/>
                        </div>
                    </div>
                    <?php
                    foreach ($this->tabRDV as $key => $value) {
                        ?>
                        <style type="text/css">
                            .contenu_onglet_<?php echo $key ?>
                            {
                                display:none;
                            }
                        </style>
                        <div id="contenu_onglet_<?php echo $key ?>" class="panel panel-primary contenu_onglet_<?php echo $key ?>">
                            <div class="panel-heading"><label><?php echo $value[0] ?></label></div>
                            <div class="panel-body">
                                <div id='content'>
                                    <script type="text/javascript">
                                        $(document).ready(function () {

                                            // Create a jqxDateTimeInput
                                            $("#dateInput<?php echo $key ?>").jqxDateTimeInput({
                                                width: '300px',
                                                height: '25px',
                                                showCalendarButton: true,
                                                theme: "bootstrap",
                                                formatString: "dd/MM/yyyy",
                                                value: <?php echo ($this->{"Date_" . $key} != null ? 'new Date("' . $this->{"Date_" . $key} . '")' : "null"); ?>});//T00:00:00
                                        });
                                    </script>
                                    <label>Date :</label>
                                    <div <?php echo $this->readonly ?> name="Date_<?php echo $key; ?>" id="dateInput<?php echo $key ?>">
                                    </div>
                                </div>
                                <label>Commentaire :</label>
                                <textarea <?php echo $this->readonly ?> id="CommentaireCK<?php echo $key ?>" class="form-control" name="Commentaire_<?php echo $key ?>" rows="4" required></textarea><br/>
                                <script>
                                    CKEDITOR.replace('CommentaireCK<?php echo $key ?>');
                                    CKEDITOR.instances['CommentaireCK<?php echo $key ?>'].setData('<?php echo $this->{"Commentaire_" . $key} ?>');
                                </script>
                                <h3><span class="label label-primary"  style="display: inline-block;">Malus :
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#jqxSlider<?php echo $key; ?>').jqxSlider({
                                                    tooltip: true,
                                                    mode: 'fixed',
                                                    showRange: false,
                                                    showButtons: false,
                                                    theme: "bootstrap",
                                                    min: -3,
                                                    max: 0,
                                                    value: <?php echo $this->{"Penalite_" . $key} ?>,
                                                    ticksFrequency: 1,
                                                    disabled: <?php echo $this->isadmin ? 'true' : 'false'; ?>});
                                                $('#jqxSlider<?php echo $key; ?>').on('change', function () {
                                                    document.getElementById("sliderValueInput<?php echo $key; ?>").value = $('#jqxSlider<?php echo $key; ?>').jqxSlider('getValue');
                                                });
                                            });</script>
                                        <div <?php echo $this->readonly ?> id='jqxSlider<?php echo $key; ?>' name="Penalite_<?php echo $key ?>"></div>
                                        <input readonly id="sliderValueInput<?php echo $key; ?>"  style="border :none;color: #337AB7; width: 50px;" value="<?php echo $this->{"Penalite_" . $key} ?>"></span></h3>
                                <?php
                                if ($key == "RDV4") {
                                    ?>
                                    <h3><span class="label label-primary"  style="display: inline-block;">Note : <input style="width:100px;display: inline-block;"<?php echo $this->readonly ?> class="form-control" name="Note"  value="<?php echo $this->Note; ?>" size="2"</span></h3>
                                            <?php
                                        }
                                        ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </form>

        </div>
        <script>
            var anc_onglet = 'Home';
            change_onglet(anc_onglet);
        </script>

        <?php
    }

}	