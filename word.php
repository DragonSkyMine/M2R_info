<?php
ini_set('memory_limit', '-1');
include_once("dao.php");
echo "<pre>";
$dao = new dao();


$req = $dao->db->prepare("SELECT DISTINCT wordId FROM keywords");
$req->execute();
while ($donnee = $req->fetch()) {

  $word = $donnee['wordId'];
  //echo $word.'<br />';

  $req2 = $dao->db->prepare("SELECT COUNT(wordId) FROM keywords WHERE wordId = :word");
  $req2->execute(array(
      'word' => $word,
    )
  );
  $donnee2 = $req2->fetch();
  //print_r($donnee2);
  $val = pow(0.9, $donnee2[0]);
  //echo $val . "<br/>";

  $req3 = $dao->db->prepare("UPDATE keywords SET idF = :val WHERE wordId = :word");
  $req3->execute(array(
      'val' => $val,
      'word' => $word
    )
  );

}









echo "</pre>";





?>
