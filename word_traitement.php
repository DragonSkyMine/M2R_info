<?php
ini_set('memory_limit', '-1');
include_once("dao.php");
echo "<pre>";
$dao = new dao();

$req = $dao->db->prepare("SELECT id, keywords FROM articles");
$req->execute();
while ($donnee = $req->fetch()) {
  $tmp_key = [];
  $tmp_key = explode(',', $donnee['keywords']);
  foreach ($tmp_key as $key => $value) {
    $value = trim($value, ':,;-?!(){}[]_=+');
    $req2 = $dao->db->prepare("INSERT INTO keywords VALUES (:word, :id, NULL)");
    $req2->execute(array(
      "id" => $donnee['id'],
      "word" => $value
    ));
  }
}

//print_r($res);
/*
foreach ($res as $key => $value) {
  $tmp_key = [];
  //echo $res[$key]['keywords'];
  $tmp_key = explode(',', $res[$key]['keywords']);
  foreach ($tmp_key as $keyT => $valueT) {
    echo $valueT;
    $req = $dao->db->prepare("INSERT INTO keywords VALUES (':word', NULL)");
    $req->execute(array(
      "word" => $valueT
    ));

  }

}
*/

//array_unique()




echo "</pre>";

?>
