            $(document).ready(function () {
        // prepare the data
            $.ajax({    
            url: './index.php?controller=Admin&action=Badgesujet',
            data: "",
            datatype: 'json',
            
            success: function(data)         
            {
                data=JSON.parse(data);

                document.getElementById('NBsujet').innerHTML = data.Nb_Sujet;
                document.getElementById('NBsujetC').innerHTML = data.Nb_SujetC;
                document.getElementById('NBsujetNA').innerHTML = data.Nb_SujetNA;
                document.getElementById('NBsujetT').innerHTML = data.Nb_SujetT;
                document.getElementById('NBEleve').innerHTML = data.Nb_Eleve;
                document.getElementById('NBEleveA').innerHTML = data.Nb_EleveA;
                document.getElementById('NBEleveNA').innerHTML = data.Nb_EleveNA;
                
            }
//            url: './application/ajax/data_SearchBar_Enseignant.ajax.php'
            
        });
    });