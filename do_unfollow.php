<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$id_fremd = $_GET['id'];  //Zieht den Parameter aus der URL
include 'database.php';
//löscht den eintrag wo die id des users und frem gleich sind
$statement = $pdo->prepare("DELETE FROM following WHERE USER_ID='$user_id' AND FOLLOWER_ID='$id_fremd'");
$statement->execute(array($user_id, $id_fremd));
echo 'Sie folgen nun dem Nutzer mit der ID: '.$id_fremd  ;
echo ' nicht mehr.';
echo '<br>';
echo "<a href=\"profil_fremd_main.php?id=".$id_fremd."\">Zurück</a>";
?>