<?php
ini_set('memory_limit', '-1');
include_once("dao.php");
$dao = new dao();

$query = $_POST['query'];
$tab_word = explode(' ', $query);

$reqImbrique = "SELECT DISTINCT articleId FROM keywords WHERE ";
foreach ($tab_word as $key => $value) {
  $reqImbrique .= "wordId LIKE '%" . $value . "%' OR ";
}
$reqImbrique = substr($reqImbrique, 0, -3);
$reqImbrique .= " ORDER BY idF DESC";

//echo $reqImbrique . '<br />';

$req = "SELECT DISTINCT auteurId FROM auteurs WHERE articleId in (" . $reqImbrique . ") ";
$req .= "ORDER BY idF LIMIT 30";

//echo $req;

$req3 = $dao->db->prepare($req);
$req3->execute();
echo "<ul>";
while ($donnee = $req3->fetch()) {
  echo "<li>" . $donnee['auteurId'] . "</li>";
}
echo "</ul>";

?>
