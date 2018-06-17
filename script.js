$(function() {

    $("#res-of-query").hide();

    $("#btnSearch").click(function() {

        // On récupère la requête
        var query = $("#txtSearch").val();

        // Si la recherche est vide
        if(query == ''){
            $.notify("Requête vide !", "error");
        }
        else{
            $.post("ajax.php",
            {
              query: query,
            },
            function(res){
                // On clear la div content
                $("#content-query").empty();

                // Ajout du res dans la div
                $("#content-query").append(res);

                // Affichage div
                $("#res-of-query").show();
            });

        }



    });

});
