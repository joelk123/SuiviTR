$(document).ready(function () {
    $("#SauverAttri").click(function () {
        var Eleve1_data = $("#SearchBar-Attribuer-Eleve1").jqxComboBox('getSelectedItem');
        var Eleve2_data = $("#SearchBar-Attribuer-Eleve2").jqxComboBox('getSelectedItem');
        var Eleve3_data = $("#SearchBar-Attribuer-Eleve3").jqxComboBox('getSelectedItem');
        var TR_data = $("#code_tr").val();
        if (Eleve1_data.originalItem.ID == "") {
            alert("Veuillez sélectionner un premier Elève !");
            return;
        }
        else if (Eleve2_data.originalItem.ID == "") {
            alert("Veuillez sélectionner un deuxième Elève !");
            return;
        }
        else if (TR_data == "") {
            alert("Veuillez appuyer sur le bouton Sujet !");
            return;
        }
        ;
        var ID_Eleve1 = Eleve1_data.originalItem.ID;
        var ID_Eleve2 = Eleve2_data.originalItem.ID;
        var ID_Eleve3 = Eleve3_data.originalItem.ID;

        var ID_TR = TR_data;

        /* DATASTRING */
        var dataString = 'ID_Eleve1=' + ID_Eleve1 + '&ID_Eleve2=' + ID_Eleve2 + '&ID_Eleve3=' + ID_Eleve3 + '&ID_TR=' + ID_TR;

        $.ajax({
            type: "POST",
//                        url: "./application/ajax/edit_Attribuer_Sujet.php",
            url: "./index.php?controller=admin&action=IAttribuerS",
            data: dataString,
            success: function () {
                location.href = '?controller=admin&action=SujetEC';
            }
        });
    });//EOC
}); //EOF
 