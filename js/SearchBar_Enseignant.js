
    $(document).ready(function () {
        // prepare the data
        var source =
        {
            datatype: "json",
            datafields: [
                { name: 'Nom' },
                { name: 'ID' }
            ],
//            url: './application/ajax/data_SearchBar_Enseignant.ajax.php'
            url: './index.php?controller=Enseignants&action=Searchbar'
        };
        
        var dataAdapter = new $.jqx.dataAdapter(source);
        
        $("#SearchBar-Enseignant").jqxComboBox(
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
        $("#SearchNavBar-Enseignant").submit(function () {

        var data = $("#SearchBar-Enseignant").jqxComboBox('getSelectedItem');
        if (data.originalItem.ID == "") {
            return false;
        }else {
            location.href = './index.php?controller=enseignants&action=suivisujet&id=' + data.originalItem.ID;
        }
    });
    });
