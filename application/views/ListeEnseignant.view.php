<html>
    <h1>Les Enseignants</h1>
    <?php
                if (\F3il\Messenger::hasMessage()): ?>
            <p>
                <div class="alert alert-success" style="width:780px;" role="success">
                    <?php echo(\F3il\Messenger::getMessage()); ?>
                </div>
            </p>
                <?php endif;
        
                 ?>
<div style="margin-top:40px;">
<!--    <table id="jqGrid"></table>
    <div id="jqGridPager"></div>-->
    <div id="jqxgrid" style="font-size: 15px; font-family: Verdana;"></div>
</div>
            <script src="./library /jqwidgets/jqxgrid.js" type="text/javascript"></script>
            <script src="./library/jqwidgets/jqxgrid.selection.js" type="text/javascript"></script>
            <script src="./library/jqwidgets/jqxgrid.pager.js" type="text/javascript"></script>
            <script src="./library/jqwidgets/jqxlistbox.js" type="text/javascript"></script>
            <script src="./library/jqwidgets/jqxdropdownlist.js" type="text/javascript"></script>
            <script src="./library/jqwidgets/jqxgrid.sort.js" type="text/javascript"></script>
            <script src="./library/jqwidgets/jqxmenu.js" type="text/javascript"></script>
            <script src="./library/jqwidgets/jqxbuttons.js" type="text/javascript"></script>
            <link href="./library/jqwidgets/styles/jqx.bootstrap.css" rel="stylesheet" type="text/css"/>
<!--    <script src="./library/jquery/grid.locale-fr.js" type="text/javascript"></script>
    <script src="./library/jquery/jquery.jqGrid.min.js" type="text/javascript"></script>-->
            <script src="./js/ListeEnseignant.js" type="text/javascript"></script>
<!--    <link href="./library/jquery/ui.jqgrid-bootstrap.css" rel="stylesheet" type="text/css"/>-->


	<script>
		var buttonclick = function (event) {
                alert('click');
            };
	</script>
   </html>
