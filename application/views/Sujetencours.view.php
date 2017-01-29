<html>
    <h1>Sujet en cours</h1>
    <?php
                if (\F3il\Messenger::hasMessage()): ?>
            <p>
                <div class="alert alert-success" role="success">
                    <?php echo(\F3il\Messenger::getMessage()); ?>
                </div>
            </p>
                <?php endif;
        
                 ?>
<div style="margin-top:40px">
    <table id="jqGrid"></table>
    <div id="jqGridPager"></div>
</div>
    <script src="./library/jquery/grid.locale-fr.js" type="text/javascript"></script>
    <script src="./library/jquery/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="./js/SujetEnCours_Admin.js" type="text/javascript"></script>
    <link href="./library/jquery/ui.jqgrid-bootstrap.css" rel="stylesheet" type="text/css"/>
	<script>
		$.jgrid.defaults.width = 780;
	</script>
   </html>

    