$(document).ready(function () {
    
    var url = window.location.search;
    var id = url.substring(url.lastIndexOf("=") + 1);
    
    $.ajax({
        url: './index.php?controller=Admin&action=GetEnseignant&id='+ id,
        data: "",
        datatype: 'string',
        success: function (data)
        {
            document.getElementById('titre').innerHTML = "Suivi de " + data;
        }
    });
    
    var sourceSujetEC = {
        datatype: "json",
        datafields: [{name: 'code_tr'}, {name: 'titre'}, {name: 'eleve'}, {name: 'etape_curr'}],
        url: './index.php?controller=admin&action=gridSujetEC_Enseignant&id=' + id
    };

    var sourceSujetNA = {
        datatype: "json",
        datafields: [{name: 'code_tr'}, {name: 'titre'}],
        url: './index.php?controller=admin&action=gridSujetNA_Enseignant&id=' + id
    };

    var sourceSujetT = {
        datatype: "json",
        datafields: [{name: 'code_tr'}, {name: 'titre'}, {name: 'eleve'}, {name: 'note'}],
        url: './index.php?controller=admin&action=gridSujetT_Enseignant&id=' + id
    };

    var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties) {
        return '<span style="margin: 4px; margin-top: 5px; margin-left: 8px; font-size: 14px; font-family: Verdana; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
    }
    var columnsrenderer = function (value) {
        return '<div style="font-size: 16px; font-family: Verdana; margin-left: 8px; margin-top: 5px; font-weight: bold;">' + value + '</div>';
    }
    var pagerrenderer = function () {
        var element = $("<div style='margin-left: 10px; margin-top: 5px; width: 100%; height: 100%;'></div>");
        var datainfo = $("#jqxgridSujetEC").jqxGrid('getdatainformation');
        var paginginfo = datainfo.paginginformation;
        var leftButton = $("<div style='padding: 0px; float: left;'><div style='margin-left: 9px; width: 16px; height: 16px;'></div></div>");
        leftButton.find('div').addClass('jqx-icon-arrow-left');
        leftButton.width(36);
        leftButton.jqxButton({
            theme: 'bootstrap'
        });
        var rightButton = $("<div style='padding: 0px; margin: 0px 3px; float: left;'><div style='margin-left: 9px; width: 16px; height: 16px;'></div></div>");
        rightButton.find('div').addClass('jqx-icon-arrow-right');
        rightButton.width(36);
        rightButton.jqxButton({
            theme: 'bootstrap'
        });
        leftButton.appendTo(element);
        rightButton.appendTo(element);
        var label = $("<div style='font-size: 11px; margin: 2px 3px; font-weight: bold; float: left;'></div>");
        label.text("1-" + paginginfo.pagesize + ' sur ' + datainfo.rowscount);
        label.appendTo(element);
        self.label = label;
        // update buttons states.
        var handleStates = function (event, button, className, add) {
            button.on(event, function () {
                if (add == true) {
                    button.find('div').addClass(className);
                } else
                    button.find('div').removeClass(className);
            });
        }
        rightButton.click(function () {
            $("#jqxgridSujetEC").jqxGrid('gotonextpage');
        });
        leftButton.click(function () {
            $("#jqxgridSujetEC").jqxGrid('gotoprevpage');
        });
        rightButton.click(function () {
            $("#jqxgridSujetNA").jqxGrid('gotonextpage');
        });
        leftButton.click(function () {
            $("#jqxgridSujetNA").jqxGrid('gotoprevpage');
        });
        rightButton.click(function () {
            $("#jqxgridSujetT").jqxGrid('gotonextpage');
        });
        leftButton.click(function () {
            $("#jqxgridSujetT").jqxGrid('gotoprevpage');
        });
        return element;
    }

    $("#jqxgridSujetEC").jqxGrid({
        source: sourceSujetEC,
        theme: 'bootstrap',
        sortable: true,
        pageable: true,
        width: 840,
        height: 250,
        rowsheight: 28,
        columnsheight: 50,
        autorowheight: true,
        showsortmenuitems: false,
        pagerrenderer: pagerrenderer,
        columns: [{text: 'Num.', align: 'center', datafield: 'code_tr', width: 70, renderer: columnsrenderer, cellsrenderer: cellsrenderer},
            {text: 'Sujet', datafield: 'titre', renderer: columnsrenderer, cellsrenderer: cellsrenderer},
            {text: 'Elèves', datafield: 'eleve', width: 305, renderer: columnsrenderer, cellsrenderer: cellsrenderer},
            {text: 'Etape<br/>Courante', datafield: 'etape_curr', width: 100, renderer: columnsrenderer, cellsrenderer: cellsrenderer}]
    });

    $("#jqxgridSujetEC").on("celldoubleclick", function (event)
    {
        var data = $('#jqxgridSujetEC').jqxGrid('getrowdata', event.args.rowindex);

        location.href = '?controller=admin&action=suivisujet&id=' + data.code_tr;
    });

    $("#jqxgridSujetT").jqxGrid({
        source: sourceSujetT,
        theme: 'bootstrap',
        sortable: true,
        pageable: true,
        width: 840,
        height: 250,
        rowsheight: 28,
        columnsheight: 30,
        autorowheight: true,
        showsortmenuitems: false,
        pagerrenderer: pagerrenderer,
        columns: [{text: 'Num.', align: 'center', datafield: 'code_tr', width: 70, renderer: columnsrenderer, cellsrenderer: cellsrenderer},
            {text: 'Sujet', datafield: 'titre', renderer: columnsrenderer, cellsrenderer: cellsrenderer},
            {text: 'Elèves', datafield: 'eleve', width: 305, renderer: columnsrenderer, cellsrenderer: cellsrenderer},
            {text: 'Note', datafield: 'note', width: 100, renderer: columnsrenderer, cellsrenderer: cellsrenderer}]
    });

    $("#jqxgridSujetT").on("celldoubleclick", function (event)
    {
        var data = $('#jqxgridSujetT').jqxGrid('getrowdata', event.args.rowindex);

        location.href = '?controller=admin&action=suivisujet&id=' + data.code_tr;
    });
    $("#jqxgridSujetNA").jqxGrid({
        source: sourceSujetNA,
        theme: 'bootstrap',
        sortable: true,
        pageable: true,
        width: 840,
        height: 250,
        rowsheight: 28,
        columnsheight: 30,
        autorowheight: true,
        showsortmenuitems: false,
        pagerrenderer: pagerrenderer,
        columns: [{text: 'Num.', align: 'center', datafield: 'code_tr', width: 70, renderer: columnsrenderer, cellsrenderer: cellsrenderer},
            {text: 'Sujet', datafield: 'titre', renderer: columnsrenderer, cellsrenderer: cellsrenderer}, ]
    });

});
