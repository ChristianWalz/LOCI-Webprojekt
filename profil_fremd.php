<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$id_fremd = $_GET['id'];  //Zieht den Parameter aus der URL
include 'database.php';
//Auslesen des fremden Nutzernamens und die Definierung der zugehörigen Variablen
$query =  $pdo->prepare ( "SELECT USERNAME FROM users WHERE USER_ID='$id_fremd'");
$query->execute(array(':id_fremd'=>$id_fremd ));
$result = $query->fetch(  PDO::FETCH_ASSOC);
$name_fremd = $result ["USERNAME"];
echo $name_fremd;
echo '<br>';
//Auslesen des fremden Studiengangs und die Definierung der zugehörigen Variablen
$query =  $pdo->prepare ( "SELECT STUDIENGANG FROM users WHERE USER_ID='$id_fremd'");
$query->execute(array(':id_fremd'=>$id_fremd ));
$result2 = $query->fetch(  PDO::FETCH_ASSOC);
$studi_fremd = $result2 ["STUDIENGANG"];
echo $studi_fremd;
echo '<br>';
//Auslesen des fremden "Übr-Mich-Textes" und die Definierung der zugehörigen Variablen
$query =  $pdo->prepare ( "SELECT UEBER FROM users WHERE USER_ID='$id_fremd'");
$query->execute(array(':id_fremd'=>$id_fremd ));
$result3 = $query->fetch(  PDO::FETCH_ASSOC);
$ueber_fremd = $result3 ["UEBER"];
echo $ueber_fremd;
echo '<br>';
$profilbild ='Profilbild_' .$id_fremd.'.png';
echo '<p><img src=$profilbild /></p>';
echo "<a href=\"do_follow.php?id=".$id_fremd."\">Folgen</a>";
?>