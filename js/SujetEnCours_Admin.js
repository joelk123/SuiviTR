
        $(document).ready(function () {
            
            $("#jqGrid").jqGrid({
                url: './application/test.php',
                mtype: "GET",
		styleUI : 'Bootstrap',
                datatype: "json",
                colModel: [
                    { label: 'Num.', name: 'code_tr',ident: "code_tr", key: true, width: 25 },
                    { label: 'Sujet', name: 'titre', width: 150 },
                    { label: 'Ens.', name: 'abv', width: 50 }
                ],
		viewrecords: true,
                height: 250,
                rowNum: 20,
                pager: "#jqGridPager",
                
                ondblClickRow: function(code_tr){

                if (code_tr !== null) {

                var data = $("#jqGrid").getRowData(code_tr);

                location.href ='./Test/EditUser/id='+ data.code_tr;

            }}
            });
                });