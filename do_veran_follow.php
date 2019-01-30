<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$id_fremd = $_GET['id'];  //Zieht den Parameter aus der URL
include 'database.php';
$statement = $pdo->prepare("INSERT INTO veranstaltungfollowlist (USER_ID, VER_ID) VALUES (?,?)");
$statement->execute(array($user_id, $id_fremd));
echo 'Sie haben sich für die Teilnahme an einer Veranstaltung eingetragen.'  ;
echo '<br>';
echo '<a href="veranstaltungen_main.php">Zurück zu den Veranstaltungen.</a>';