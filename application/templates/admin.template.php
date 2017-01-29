<?php
defined('__SuiviTR__') or die('Acces interdit');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Suivi TR 3iL : Espace Admin</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="library/bootstrap-3.3.5-dist/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/template.css" >
        <link rel="stylesheet" href="./library/jqwidgets/styles/jqx.base.css" type="text/css">
        <link href="./library/jqwidgets/styles/jqx.bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <script type="text/javascript" src="./library/jquery/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxdata.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="./library/jqwidgets/jqxcombobox.js"></script>
        <script src="./js/SearchBar_Admin.js" type="text/javascript"></script>
        <script src="./js/Badge_Admin.js" type="text/javascript"></script>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand"  href="?controller=admin">
                        <img class="img-brand " alt="Brand" src="images/SuiviTR_logo.png"/>  
                    </a>
                    <?php
                    $user = \F3il\Authentication::getUserData();
                    $userName = substr($user['prenom'], 0, 1) . '.' . $user['nom'];
                    ?>
                    <small class="Nom-Enseignant">[<?php echo $userName ?>]</small>

                </div>
                <div class="container">

                    <form class="navbar-form" id="SearchNavBar-Admin"  onsubmit="return false;">
                        <div class="input-group">
                            <div id="SearchBar-Admin" class="form-control"></div>            
                            <div class="input-group-btn">
                                <button  type="submit" class="btn btn-default" id="Btn-SearchBar-Admin"><i class="glyphicon glyphicon-search"></i></button>
                            </div>    
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./index.php?controller=admin&action=deco">Se Déconnecter</a></li>
                    </ul>
                    <!--</div>--><!-- /.navbar-collapse -->
                </div>

            </nav>
        </header>
        <main>
            <div class="col-md-3">
                <div class="list-group">
                    <a class="list-group-item disabled-perso">
                        Les sujets <span class="badge" id="NBsujet"></span>
                    </a>
                    <a href="?controller=admin&action=SujetEC" class="list-group-item sub-item">
                        ● Sujets en cours <span class="badge" id="NBsujetC"></span>
                    </a>
                    <a href="?controller=admin&action=SujetNA" class="list-group-item sub-item">
                        ● Sujets non attribués <span class="badge" id="NBsujetNA"></span>
                    </a>
                    <a href="?controller=admin&action=SujetT" class="list-group-item sub-item">
                        ● Sujets terminés <span class="badge" id="NBsujetT"></span>
                    </a>
                    <a href="?controller=admin&action=enseignant" class="list-group-item">
                        Les enseignants 
                    </a>
                    <a class="list-group-item disabled-perso">
                        Les élèves <span class="badge" id="NBEleve"></span>
                    </a>
                    <a href="?controller=admin&action=EleveA" class="list-group-item sub-item">
                        ● Affectés <span class="badge" id="NBEleveA"></span>
                    </a>
                    <a href="?controller=admin&action=EleveNA" class="list-group-item sub-item">
                        ● Sans affectation <span class="badge" id="NBEleveNA"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-7">

                <?php $this->insertView();
                ?>
            </div>
        </main>
    </body>
</html>
