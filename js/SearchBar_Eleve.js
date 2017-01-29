    
    $(document).ready(function () {
        // prepare the data
        var source =
        {
            datatype: "json",
            datafields: [
                { name: 'Nom' },
                { name: 'ID' },
            ],
            url: './application/ajax/data_SearchBar_Attribuer_Eleve.ajax.php'
        };
        var dataAdapter = new $.jqx.dataAdapter(source);
        $("#SearchBar-Attribuer-Eleve1").jqxComboBox(
        {
            source: dataAdapter,
            theme: 'classic',
            width: 580,
            height: 20,
            selectedIndex: 0,
            displayMember: 'Nom',
            valueMember: 'ID',
            showArrow: false,
            autoComplete: true,
            searchMode: 'containsignorecase'
        });
        $("#SearchBar-Attribuer-Eleve2").jqxComboBox(
        {
            source: dataAdapter,
            theme: 'classic',
            width: 580,
            height: 20,
            selectedIndex: 0,
            displayMember: 'Nom',
            valueMember: 'ID',
            showArrow: false,
            autoComplete: true,
            searchMode: 'containsignorecase'
        });
        $("#SearchBar-Attribuer-Eleve3").jqxComboBox(
        {
            source: dataAdapter,
            theme: 'classic',
            width: 580,
            height: 20,
            selectedIndex: 0,
            displayMember: 'Nom',
            valueMember: 'ID',
            showArrow: false,
            autoComplete: true,
            searchMode: 'containsignorecase'
        });
        $('#resetE1').on('click',function(e){
            e.preventDefault();
            $("#SearchBar-Attribuer-Eleve1").val("");
        });
        $('#resetE2').on('click',function(e){
            e.preventDefault();
            $('#SearchBar-Attribuer-Eleve2').val("");
        });
        $('#resetE3').on('click',function(e){
            e.preventDefault();
            $('#SearchBar-Attribuer-Eleve3').val("");
        });
        



    });
