<pre>
  <?php
  require_once 'dao.php';

  $dbname = "m2r_info";
  $login = "root";
  $password = "root";

  $bdd = new PDO('mysql:host=localhost;dbname='.$dbname, $login, $password);


  function enregistreArticle($val, $bdd) {
    $req = $bdd->prepare("INSERT INTO articles (titre, datea, journal, auteurs, abstract, keywords) VALUES (:titre, :datea, :journal, :auteurs, :abstract, :keywords)");
    $req->execute(array(
      "titre" => $val['titre'],
      "datea" => $val['datea'],
      "journal" => $val['journal'],
      "auteurs" => join(",", $val['auteurs']),
      "abstract" => $val['abstract'],
      "keywords" => $val['keywords']
    ));
  }



  $file_handle = fopen("outputacm.txt", "r");

  $article = array('titre' => "", 'datea' => "", 'journal' => "", 'auteurs' => "", 'abstract' => "", 'keywords' => "");
  $i = 0;
  while (!feof($file_handle) && $i < 5000) {
    $line = fgets($file_handle);
    if ($line == "\n") {
      enregistreArticle($article, $bdd);
      $article = array('titre' => "", 'datea' => "", 'journal' => "", 'auteurs' => "", 'abstract' => "", 'keywords' => "");
      $i++;
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
      $article['keywords'] = array_diff(explode(' ', strtolower($article['titre']).' '.strtolower($article['abstract'])), DAO::getStopWords());
      foreach ($article['keywords'] as $key => $value) {
        $article['keywords'][$key] = trim($article['keywords'][$key], ':,;-?!(){}[]_=+');
      }
      $article['keywords'] = implode(',' ,$article['keywords']);
      //print_r($article);
    }
  }
  fclose($file_handle);





  ?>
</pre>
