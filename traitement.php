<?php
ini_set('memory_limit', '-1');
include_once("dao.php");
echo "<pre>";
$dao = new dao();

$req = $dao->db->prepare("SELECT DISTINCT keywords FROM articles");
$req->execute();
$res = $req->fetchAll(PDO::FETCH_ASSOC);

//print_r($res);

foreach ($res as $key => $value) {
  $tmp_key = [];
  echo $res[$key]['keywords'];
  $tmp_key = explode(',', $res[$key]['leywords']);
  foreach ($tmp_key as $keyT => $valueT) {

    $req = $bdd->prepare("INSERT INTO keywords (wordId) VALUES (:word)");
    $req->execute(array(
      "titre" => $val['titre'],
      "datea" => $val['datea'],
      "journal" => $val['journal'],
      "auteurs" => join(",", $val['auteurs']),
      "abstract" => $val['abstract'],
      "keywords" => $val['keywords']
    ));

  }

}


//array_unique()




echo "</pre>";

?>
