
        <html>        
<script src="./library /jqwidgets/jqxgrid.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxgrid.selection.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxgrid.pager.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxlistbox.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxdropdownlist.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxgrid.sort.js" type="text/javascript"></script>
<script src="./library/jqwidgets/jqxmenu.js" type="text/javascript"></script>
<link href="./library/jqwidgets/styles/jqx.bootstrap.css" rel="stylesheet" type="text/css"/>  
<script src="./js/One_Enseignant_Admin.js" type="text/javascript"></script>
        <div class="col-md-10">
                <div class="page-header">
                    <h1 id="titre"></h1>
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
                    <li class="active" id="li_onglet_SujetEC"><a data-toggle="tab" id="onglet_SujetEC" onclick="javascript:change_onglet('SujetEC');">En cours</a></li>
                    <li id="li_onglet_SujetNA" ><a data-toggle="tab" id="onglet_SujetNA" onclick="javascript:change_onglet('SujetNA');">Non attribués</a></li>
                    <li id="li_onglet_SujetT" ><a data-toggle="tab" id="onglet_SujetT" onclick="javascript:change_onglet('SujetT');">Terminés</a></li>
                </ul>
                <div class="tab-content">
                    <div id="contenu_onglet_SujetEC" class="contenu_onglet_SujetEC form-group panel panel-primary tab-pane fade in active">
                        <div class="panel-heading">
                            <label>Sujet en cours :</label>
                        </div>
                        <div class="panel-body">
                            <div id="jqxgridSujetEC" class = "jqxgrid"></div>
                        </div>
                    </div>
                    
                        <style type="text/css">
                            .contenu_onglet_SujetNA
                            {
                                display:none;
                            }
                            .contenu_onglet_SujetT
                            {
                                display:none;
                            }
                        </style>
                        <div id="contenu_onglet_SujetNA" class="panel panel-primary contenu_onglet_SujetNA">
                            <div class="panel-heading"><label>Sujets non attribués :</label></div>
                            <div class="panel-body">
                                    <div id="jqxgridSujetNA" class = "jqxgrid"></div>
                        </div>
                        </div>
                         <div id="contenu_onglet_SujetT" class="panel panel-primary contenu_onglet_SujetT">
                            <div class="panel-heading"><label>Sujets terminés :</label></div>
                            <div class="panel-body">
                                <div id="jqxgridSujetT" class = "jqxgrid"></div>
                                
                            </div>
                        </div>

                
        </div>
        <script>
            var anc_onglet = 'SujetEC';
            change_onglet(anc_onglet);
        </script>


        <?php
    



/*<div class=\"form-group input-group\" id=\"date".$key."\">
                            <input type=\"text\" class=\"form-control\" />
                            <span class=\"input-group-addon\">
                                <span class=\"glyphicon glyphicon-calendar\"></span>
                            </span>
                        </div>*/
						