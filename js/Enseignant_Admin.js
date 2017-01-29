$(document).ready(function () {


    // prepare the data
    var source = {
        datatype: "json",
        datafields: [{name: 'id'}, {name: 'abv'}, {name: 'enseignant'}, {name: 'SujetEC'}, {name: 'SujetNA'}, {name: 'SujetT'}],
        url: './index.php?controller=admin&action=gridEnseignant'

    };
    var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties) {
        return '<span style="margin: 4px; margin-left: 8px; font-size: 14px; font-family: Verdana; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
    };
    var columnsrenderer = function (value) {
        return '<div style="font-size: 16px; font-family: Verdana; margin-left: 8px; margin-top: 5px; font-weight: bold;">' + value + '</div>';
    };
    var renderer = function (id) {
        return "<button class='btn btn-danger btn-xs' style='margin: 4px; margin-left: 13px;'><span class= 'glyphicon glyphicon-trash'></span></button>";
    };
    var pagerrenderer = function () {
        var element = $("<div style='margin-left: 10px; margin-top: 5px; width: 100%; height: 100%;'></div>");
        var datainfo = $("#jqxgrid").jqxGrid('getdatainformation');
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
            $("#jqxgrid").jqxGrid('gotonextpage');
        });
        leftButton.click(function () {
            $("#jqxgrid").jqxGrid('gotoprevpage');
        });
        return element;
    }

    console.log(source);
    $("#jqxgrid").jqxGrid({
        source: source,
        theme: 'bootstrap',
        sortable: true,
        pageable: true,
        width: 780,
        height: 250,
        rowsheight: 28,
        columnsheight: 30,
        autorowheight: true,
        showsortmenuitems: false,
        pagerrenderer: pagerrenderer,
        columns: [{text: '', align: 'center', datafield: 'id', renderer: columnsrenderer, cellsrenderer: cellsrenderer, hidden: true},
            {text: 'Enseignants', datafield: 'enseignant', width: 400, renderer: columnsrenderer, cellsrenderer: cellsrenderer},
            {text: 'En cours', datafield: 'SujetEC', width: 120, renderer: columnsrenderer, cellsrenderer: cellsrenderer},
            {text: 'Non attribués', datafield: 'SujetNA', width: 135, renderer: columnsrenderer, cellsrenderer: cellsrenderer},
            {text: 'Terminés', datafield: 'SujetT', width: 125, renderer: columnsrenderer, cellsrenderer: cellsrenderer}, ]
    });


    $("#jqxgrid").on("celldoubleclick", function (event)
    {
        var data = $('#jqxgrid').jqxGrid('getrowdata', event.args.rowindex);

        location.href = '?controller=admin&action=AfficherEnseignant&id=' + data.id;
    });

});



