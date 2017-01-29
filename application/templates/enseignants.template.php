<?php
defined('__SuiviTR__') or die('Acces interdit');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Suivi TR 3iL : Espace Enseignant</title>
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
        <script src="./js/SearchBar_Enseignant.js" type="text/javascript"></script>
        <script src="./js/Badge_Enseignant.js" type="text/javascript"></script>
        <header>

            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="?controller=enseignants">
                        <img class="img-brand" alt="Brand" src="images/SuiviTR_logo.png"/>  
                    </a>

                    <?php
                    $user = \F3il\Authentication::getUserData();
                    $userName = substr($user['prenom'],0,1) . '.' . $user['nom'];
                    ?>
                    <small class="Nom-Enseignant">[<?php echo $userName; ?>]</small>

                </div>
                <div class="container">


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
                    <form class="navbar-form" id="SearchNavBar-Enseignant" onsubmit="return false;">
                        <div class="input-group">
                            <div id="SearchBar-Enseignant" class="form-control"> </div>  <!--
                            <input type="text" class="form-control" placeholder="Search" name="q">
                            -->            <div class="input-group-btn">
                                <button  type="button" class="btn btn-default" id="Btn-SearchBar-Enseignant"><i class="glyphicon glyphicon-search"></i></button>
                            </div><!--
                            -->        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./index.php?controller=enseignants&action=deco">Se Déconnecter</a></li>
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
                    <a href="?controller=enseignants&action=SujetEC" class="list-group-item sub-item">
                        ● Sujets en cours <span class="badge" id="NBsujetC"></span>
                    </a>
                    <a href="?controller=enseignants&action=SujetNA" class="list-group-item sub-item">
                        ● Sujets non attribués <span class="badge" id="NBsujetNA"></span>
                    </a>
                    <a href="?controller=enseignants&action=SujetT" class="list-group-item sub-item">
                        ● Sujets terminés <span class="badge" id="NBsujetT"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <?php
                $this->insertView();
                ?>
            </div>
        </main>
    </body>
</html>
