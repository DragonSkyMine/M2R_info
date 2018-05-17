<pre>
  <?php

  $dbname = "m2r_info";
  $login = "root";
  $password = "root";

  $bdd = new PDO('mysql:host=localhost;dbname='.$dbname, $login, $password);


  function enregistreArticle($val, $bdd) {
    $req = $bdd->prepare("INSERT INTO articles (titre, datea, journal, auteurs, abstract) VALUES (:titre, :datea, :journal, :auteurs, :abstract)");
    $req->execute(array(
      "titre" => $val['titre'],
      "datea" => $val['datea'],
      "journal" => $val['journal'],
      "auteurs" => join(",", $val['auteurs']),
      "abstract" => $val['abstract']
    ));
  }



  $file_handle = fopen("outputacm.txt", "r");

  $article = array('titre' => "", 'datea' => "", 'journal' => "", 'auteurs' => "", 'abstract' => "");
  while (!feof($file_handle)) {
    $line = fgets($file_handle);
    if ($line == "\n") {
      enregistreArticle($article, $bdd);
      $article = array('titre' => "", 'datea' => "", 'journal' => "", 'auteurs' => "", 'abstract' => "");
    } else {
      switch (str_split($line, 2)[0]) {
        case '#*':
        $article['titre'] = explode("#*", $line)[1];
        break;

        case '#t':
        $article['date'] = explode("#t", $line)[1];
        break;

        case '#c':
        $article['journal'] = explode("#c", $line)[1];
        break;

        case '#@':
        $t_auteurs = explode("#@", $line)[1];
        $article['auteurs'] = explode(',', $t_auteurs);
        break;

        case '#!':
        $article['abstract'] = explode("#!", $line)[1];
        break;

        default:
        // code...
        break;
      }
      //print_r($article);
    }
  }
  fclose($file_handle);





  ?>
</pre>
