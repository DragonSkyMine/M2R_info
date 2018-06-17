$(function() {

    $("#btnSearch").click(function() {
    
        // On récupère la requête
        var query = $("#txtSearch").val();

        // Si il y a une requête on fait un appel Ajax pour chercher les auteurs
        if(query != ''){
            $.post("blabla.php",
            {
                query: query,
            },
            function(res){
               console.log(res);
            });
           
        }
    
    });

});