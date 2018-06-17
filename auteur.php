<?php
ini_set('memory_limit', '-1');
include_once("dao.php");
echo "<pre>";
$dao = new dao();


$req = $dao->db->prepare("SELECT DISTINCT auteurId FROM auteurs");
$req->execute();
while ($donnee = $req->fetch()) {

  $auteur = $donnee['auteurId'];
  //echo $auteur.'<br />';

  $req2 = $dao->db->prepare("SELECT COUNT(auteurId) FROM auteurs WHERE auteurId = :auteur");
  $req2->execute(array(
      'auteur' => $auteur,
    )
  );
  $donnee2 = $req2->fetch();
  //print_r($donnee2);
  $val = pow(0.9, $donnee2[0]);
  //echo $val . "<br/>";

  $req3 = $dao->db->prepare("UPDATE auteurs SET idF = :val WHERE auteurId = :auteur");
  $req3->execute(array(
      'val' => $val,
      'auteur' => $auteur
    )
  );

}









echo "</pre>";





?>
