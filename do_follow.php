<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$id_fremd = $_GET['id'];  //Zieht den Parameter aus der URL
include 'database.php';
//erstellt eintrag wo die id des users und frem gleich sind
$statement = $pdo->prepare("INSERT INTO following (USER_ID, FOLLOWER_ID) VALUES (?,?)");
$statement->execute(array($user_id, $id_fremd));
echo 'Sie folgen nun dem Nutzer mit der ID: '.$id_fremd  ;
echo '<br>';
echo "<a href=\"profil_fremd_main.php?id=".$id_fremd."\">Zurück</a>";