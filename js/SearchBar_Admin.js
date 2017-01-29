
    $(document).ready(function () {
        // prepare the data
        var source =
        {
            datatype: "json",
            datafields: [
                { name: 'Nom' },
                { name: 'Type' },
                { name: 'ID' }
            ],
//            url: './application/ajax/data_SearchBar_Admin.ajax.php'
            url: './index.php?controller=Admin&action=Searchbar'

        };
        
        var dataAdapter = new $.jqx.dataAdapter(source);
        
        $("#SearchBar-Admin").jqxComboBox(
        {
            source: dataAdapter,
            theme: 'classic',
            width: 600,
            height: 20,
            selectedIndex: 0,
            displayMember: 'Nom',
            valueMember: 'Nom',
            showArrow: false,
            autoComplete: true,
            searchMode: 'containsignorecase'
        });
    $("#SearchNavBar-Admin").submit(function () {

        var data = $("#SearchBar-Admin").jqxComboBox('getSelectedItem');
        if (data.originalItem.ID == "") {
            
            return false;
        }else if (data.originalItem.Type == "TR") {
            location.href = './index.php?controller=admin&action=suivisujet&id=' + data.originalItem.ID;
        }
        else if (data.originalItem.Type == "Enseignant"){
            location.href = './index.php?controller=admin&action=afficherenseignant&id=' + data.originalItem.ID;
        }
    });
    });
