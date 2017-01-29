  $(document).ready(function () {
$( "#RandomSujet" ).click(function() {
    $.ajax({                                             
      url:"./index.php?controller=admin&action=randoms",
      data: "",                      
      dataType: 'json',                   
      success: function(data)         
      {
         $('#enseignant').val(data[0].Enseignant);
         $('#code_tr').val(data[0].ID);
         $('#titre').val(data[0].Titre);

      } 
            });
        });
    });