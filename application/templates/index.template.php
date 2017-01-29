<?php
defined('__SuiviTR__') or die('Acces interdit');
?>
<html>
    <head>
        <title>Suivi de TR - 3iL</title>
        <meta charset="UTF-8">
        <link href="library/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1 class="login-title">Suivi de TR</h1><br>
        <div class="modal-dialog">

            <?php
            $this->insertView();
            ?>

        </div>
    </body>
</html>
