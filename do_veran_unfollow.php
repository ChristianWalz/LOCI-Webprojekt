<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$id_fremd = $_GET['id'];  //Zieht den Parameter aus der URL
include 'database.php';
//löscht eintag aus datenbank wo user id und veranstaltung id gleich sind
$statement = $pdo->prepare("DELETE FROM veranstaltungfollowlist WHERE USER_ID='$user_id' AND VER_ID='$id_fremd'");
$statement->execute(array($user_id, $id_fremd));
echo 'Sie haben sich für die Teilnahme an einer Veranstaltung ausgetragen.'  ;
echo '<br>';
echo '<a href="veranstaltungen_main.php">Zurück zu den Veranstaltungen.</a>';