<?php include_once("dao.php"); ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>M2R_info</title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="style.css">
    <script src="script.js" charset="utf-8"></script>
    <script src="notify.js" charset="utf-8"></script>
  </head>

  <body>
    <div class="nav">
      <div class="inner">
        <div class="container">
          <div class="row">
            <div class="searchInput">
                  <input type="text" class="searchField" id="txtSearch">
                  <label for="search" class="glyphicon glyphicon-search" rel="tooltip" title="search" id="btnSearch"></label>
            </div>
          </div>
        </div>
      </div>
    </div>

  </br>

    <div id="res-of-query">
      </br>
      <h1>Résultat(s) :</h1>
      <hr>
      <div id="content-query">
      </div>
    </div>
  </body>

</html>
