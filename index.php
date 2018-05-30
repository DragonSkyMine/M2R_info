<?php include_once("dao.php"); ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>M2R_info</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" charset="utf-8"></script>
  </head>
  <body>
    <h1>Bonjour</h1>
    <?php
      $dao = new dao();
      $dao->getAuthors("John Blaint");
    ?>
  </body>
</html>
